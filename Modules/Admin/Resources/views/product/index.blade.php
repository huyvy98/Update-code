@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Quản lý sản phẩm')
@section('content')
    @if(Auth::guard('admin')->user()->hasPermissionTo('products.create'))
        <a style="float: right;margin-bottom: 5px" type="button" class="btn btn-primary"
           href="{{route('products.create')}}">Add New</a>
    @endcan
    <form method="GET">
        @csrf
        @method('GET')
        <input style="width: 300px; float: left" type="search" name="searchName" class="form-control"
               placeholder="Name">
        <input style="width: 300px;margin-left: 5px" type="search" name="productPrice" class="form-control"
               placeholder="Price">
        <button style="position: absolute;top: 65px;right: 585px" type="submit" class="btn btn-primary mb-3">Search
        </button>
    </form>
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
                <td>{{number_format($product->price)}} VND</td>
                <td>{{$product->description}}</td>
                <td><img src="/storage/{{$product->image}}" width="50px" height="50px"/></td>
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('products.edit'))
                        <a style="float: left;margin-right: 5px" type="button" class="btn btn-warning"
                           href="{{ route('products.edit' , $product)}}">Edit</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('products.destroy'))
                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
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
