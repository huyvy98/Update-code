@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','categories / edit')
@section('headerText','Sửa danh mục')
@section('content')

    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $categories->name) }}">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection
