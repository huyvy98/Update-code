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
            <th scope="col"><li class="breadcrumb-item"><a href="/admin/add">Add New</a></li></th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->image}}</td>
                <td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
@endsection
