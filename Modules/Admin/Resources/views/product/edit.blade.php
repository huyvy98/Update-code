@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','products / edit')
@section('headerText','Sửa sản phẩm')
@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $products->name) }}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select name="category[]" multiple>
                @foreach($category as $key => $cate)
                    <option
                        value="{{$cate->id}}" {{ old('category', $products->category)->contains($cate->id) ? 'selected' : '' }}>{{$cate->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input class="form-control" type="number" name="price" value="{{ old('price', $products->price) }}">
        </div>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input class="form-control" type="text" name="description"
                   value="{{ old('description', $products->description) }}">
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input class="form-control" id="exampleInputPassword1" type="file" name="image"
                   value="{{ old('image', $products->image) }}">
            <img width="50px" height="50px" src="/storage/{{$products->image}}"/>
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <p>
    </p>
@endsection
