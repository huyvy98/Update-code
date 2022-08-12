@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Sửa sản phẩm')
@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{$products->name}}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input class="form-control" type="number" name="price" value="{{$products->price}}" >
        </div>
        @error('price')
        <div class="alert alert-danger" >{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input class="form-control" type="text" name="description" value="{{$products->description}}">
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input class="form-control" type="file" name="image" value="{{$products->image}}">
        </div>
        @error('image')
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
