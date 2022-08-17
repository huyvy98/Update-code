@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Quản lý Role')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Permission Management</h2>
                <div class="card-tools">
                    <button type="button" class="btn btn-success btn-create" data-toggle="modal"
                            data-target="#PermissionModal">
                        <i class="fas fa-plus-square"></i> Add Permission
                    </button>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="permission_table" class="table table-bordered data-table">
                    <thead>
                    <tr class="bg-blue">
                        <th width="50px">No</th>
                        <th>Name</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- Modal UpadateOrCreate Permission -->

    <div class="modal fade" id="PermissionModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form method="POST" action="" id="permissionForm">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add permission</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" id="permission_method" value="POST">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" placeholder="Enter Name" value="" required>
                                @error('name')
                                <p class="mt-2 mb-0 error text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="savedata">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')

    <script type="text/javascript">
        $(function () {

            var change = $('#permission_table').DataTable({
                'responsive': true,
                //'fixedHeader': true,
                'autoWidth': false,
                'processing': true,
                'serverside': true,
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Show all"]],
                'ajax': {
                    'dataSrc': 'permissions'
                },
                'columns': [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: ''
                    },
                    {data: 'name'},
                    {
                        data: 'id',
                        orderable: false,
                        render: function (data) {
                            return '<button class="btn btn-sm btn-info btn-edit mr-1" data-id="' + data + '">Edit</button>' +
                                '<button class="btn btn-sm btn-danger btn-delete" data-id="' + data + '">Delete</button>';
                        }
                    }
                ],
                order: [[1, 'desc']],
                "columnDefs": [
                    {'className': 'dt-center', 'targets': '_all'}
                ]
            });

            //Plus detail
            $('#permission_table tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = change.row(tr);

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });

            function format(rowData) {
                return '<table class="table table-bordered">' +
                    '<tr style="background: #f9f9f9">' +
                    '<th width="30%">Title</th>' +
                    '<th width="70%">Details</th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>ID:</td>' +
                    '<td>' + rowData.id + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Name:</td>' +
                    '<td>' + rowData.name + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Created at:</td>' +
                    '<td>' + Date(rowData.created_at) + '</td>' +
                    '</tr>' +
                    '</table>';
            };

            //create
            $('#permission_table').on('click', '.btn-create', function (e) {
                e.preventDefault;
                var url = '{{ route("permissions.store") }}';
                $('.modal-title').html("Create permission");
                $('#permissionForm').attr('action', url);
                $('#permission_method').attr('value', 'POST');
                $('#id').val('');
            });
            //edit
            $('#permission_table').on('click', '.btn-edit', function () {
                var permission_id = $(this).data('id');
                {{--var url = '{{ route("permissions.update","") }}' + '/' + permission_id;--}}
                $.ajax({
                    cache: false,
                    success: function (data) {
                        $('#PermissionModal').modal('show');
                        $('.modal-title').html("Edit permission");
                        $.each(data.permissions, function (index, value) {
                            if (value.id === permission_id) {
                                $('#id').val(permission_id);
                                $('#name').val(value.name);
                                $('#permissionForm').attr('action', url);
                                $('#permission_method').attr('value', 'PATCH');
                            }
                        });
                    }
                });
            });
            $('#PermissionModal').on('hidden.bs.modal', function () {
                $(this).find('form').trigger('reset');
                $('.error').html('');
                $('#name').removeClass("is-invalid");
            });

            //Delete
            $('#permission_table').on("click", ".btn-delete", function () {
                var permission_id = $(this).data('id');
                {{--var url = '{{ route("permissions.destroy","") }}' + '/' + permission_id;--}}
                Swal.fire({
                    title: 'Are you sure you want to delete this record?',
                    text: "If you delete this, it will be gone forever.",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    showDenyButton: true,
                    denyButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            cache: false,
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (response) {
                                Swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
                                    "success"
                                ).then(function () {
                                    location.reload();
                                });
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('Your record is safe', '', 'info')
                    }

                });
            });

            @if(count($errors))
            $('#PermissionModal').modal('show');
            @endif

        });
    </script>
@endsection
