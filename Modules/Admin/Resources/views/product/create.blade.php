@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','products / create')
@section('headerText','Thêm sản phẩm')
@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ route('products.create') }}">
        @csrf
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name Product">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select name="category_ids[]" multiple>
                @foreach($category as $cate)
                    <option
                        value="{{$cate->id}}" {{old('category_ids', $cate->id) ? 'selected' : ''}}>{{$cate->name}}</option>
                @endforeach
            </select>
        </div>
        @error('category_ids')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input class="form-control" type="number" name="price" value="{{ old('price') }}" placeholder="Price">
        </div>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}"
                   placeholder="Description">
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <input class="form-control" id="inputGroupFile02" type="file" name="image" value="{{ old('image') }}">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

@endsection
