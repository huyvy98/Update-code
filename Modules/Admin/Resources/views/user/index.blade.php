@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','user')
@section('headerText','Trang quan li user')
@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$user->firstname .' ' . $user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('superadmin.admin.destroy'))
                        <form method="POST" action="{{ route('user.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
