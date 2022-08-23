@extends('admin::dashboard.authBase')
@section('title', 'Tomosia')

@section('content')
    <div class="card-group d-block d-md-flex row">
        <div class="card col-md-7 p-4 mb-0">
            <div class="card-body">
                <h1 style="color: #E4DCCF; text-align: center">Login</h1>
                <p style="color: #E4DCCF; text-align: center" class="text-medium-emphasis">Sign In to your account</p>
                <form method="POST" action="{{route('auth.login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="color: #E4DCCF">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               placeholder="Your email"
                               value="{{old('email')}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color: #E4DCCF">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Your password"
                               value="{{old('password')}}">
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </form>
            </div>
        </div>
        <div class="card col-md-5 text-white bg-primary py-5">
            <div class="card-body text-center">
                <div>
                    <h2>Login with Us!!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

