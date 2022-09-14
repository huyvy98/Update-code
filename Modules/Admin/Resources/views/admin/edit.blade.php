@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Sửa admin')
@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input class="form-control" type="text" name="firstname" value="{{ old('firstname', $admins->firstname) }}"
                   placeholder="">
        </div>
        @error('firstname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input class="form-control" type="text" name="lastname" value="{{ old('lastname', $admins->lastname) }}"
                   placeholder="Last Name">
        </div>
        @error('lastname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email', $admins->email) }}">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input class="form-control" type="password" name="password"
                   placeholder="Password">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone', $admins->phone) }}"
                   placeholder="Phone Number">
        </div>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
@endsection
