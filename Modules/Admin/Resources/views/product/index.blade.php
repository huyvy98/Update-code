@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Quản lý sản phẩm')
@section('content')
    <a style="float: right;margin-bottom: 5px" type="button" class="btn btn-primary"
       href="{{route('products.create')}}">Add New</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><img src="/storage/{{$product->image}}" width="50px" height="50px"/></td>
                <td>
                    <a style="float: left;margin-right: 5px" type="button" class="btn btn-warning"
                       href="{{ route('products.edit' , $product)}}">Edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>

    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
