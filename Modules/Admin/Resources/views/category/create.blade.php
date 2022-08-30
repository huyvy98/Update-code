@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','categories / create')
@section('headerText','Thêm danh mục')
@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ route('categories.create') }}">
        @csrf
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name Cate">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

@endsection
