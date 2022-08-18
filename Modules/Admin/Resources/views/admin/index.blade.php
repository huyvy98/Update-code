@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Trang quan li admin')
@section('content')

    @if(Auth::guard('admin')->user()->hasPermissionTo('superadmin.admin.create'))
        <a style="float: right;margin-bottom: 5px" type="button" class="btn btn-primary"
           href="{{route('admin.create')}}">Add New</a>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ho ten</th>
            <th scope="col">Email</th>
            <th scope="col">So dien thoai</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$admin->firstname .' ' . $admin->lastname}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->phone}}</td>
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('superadmin.admin.edit'))
                        <a style="float: left;margin-right: 5px" type="button" class="btn btn-warning"
                           href="{{ route('admin.edit' , $admin)}}">Edit</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('superadmin.admin.destroy'))
                        <form method="POST" action="{{ route('admin.destroy', $admin) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$admins->links()}}
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
