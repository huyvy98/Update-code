@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Thêm sản phẩm')
@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{route('admin.create')}}">
        @csrf
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input class="form-control" type="text" name="firstname" value="{{ old('firstname') }}"
                   placeholder="First Name">
        </div>
        @error('firstname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input class="form-control" type="text" name="lastname" value="{{ old('lastname') }}"
                   placeholder="Last Name">
        </div>
        @error('lastname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input class="form-control" type="password" name="password" value="{{ old('password') }}"
                   placeholder="Password">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}"
                   placeholder="Phone Number">
        </div>
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

@endsection
