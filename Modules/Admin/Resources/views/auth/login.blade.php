@extends('admin::dashboard.base')
@section('title', 'Tomosia')

@section('headerText','Đăng nhập')
@section('content')
    <form method="POST" action="{{route('admin.login')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   value="{{old('email')}}">
        </div>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                   value="{{old('password')}}">
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary" name="login">Submit</button>
    </form>
{{--            <div class="card-group d-block d-md-flex row">--}}
{{--                <div class="card col-md-7 p-4 mb-0">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="input-group mb-6"><span class="input-group-text"></span>--}}
{{--                            <input class="form-control" type="text" placeholder="Username">--}}
{{--                        </div>--}}
{{--                        <div class="input-group mb-4"><span class="input-group-text"></span>--}}
{{--                            <input class="form-control" type="password" placeholder="Password">--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-6">--}}
{{--                                <button class="btn btn-primary px-4" type="button">Login</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
@endsection

