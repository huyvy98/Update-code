@extends('admin::dashboard.base')

@section('title', 'Tomosia')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">
                <li class="breadcrumb-item"><a href="{{route('products.create')}}">Add New</a></li>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><img src="/storage/{{$product->image}}" width="50px" height="50px"/></td>
                <td>
                    <a href="{{ route('products.edit' , $product)}}">Edit</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
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
