@extends('admin::dashboard.base')

@section('title', 'Tomosia')

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
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" name="price" value="{{ old('price') }}">
            </div>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="description" value="{{ old('description') }}">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
@endsection
