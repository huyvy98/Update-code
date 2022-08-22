@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','products')
@section('headerText','Quản lý sản phẩm')
@section('content')
    @if(Auth::guard('admin')->user()->hasPermissionTo('products.create'))
        <a style="float: right;margin-bottom: 5px" type="button" class="btn btn-primary"
           href="{{route('products.create')}}">Add New</a>
    @endcan
    <form method="GET">
        <input style="width: 300px; float: left" type="search" name="searchName" class="form-control"
               value="{{ old('searchName') }}"
               placeholder="Name">
        <input style="width: 150px;margin-left: 5px" type="search" name="minPrice" class="form-control"
               value="{{ old('minPrice') }}"
               placeholder="From">
        <input style="width: 150px;position: absolute;left: 475px;top: 65px" type="search" name="maxPrice"
               class="form-control"
               value="{{ old('maxPrice') }}"
               placeholder="To">
        <button style="position: absolute;top: 65px;right: 585px" type="submit" class="btn btn-primary mb-3">Search
        </button>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
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
                @if(!empty($product->category[0]['name']))
                    <td>
                        @foreach($product->category as $key =>$val)
                            <li >{{$val['name']}}</li>
                        @endforeach
                    </td>
                @else
                    <td></td>
                @endif
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
                            <button type="submit" onclick="return confirm('Bạn có muốn xóa không?')"
                                    class="btn btn-danger">Delete
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->withQueryString()->links() }}
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>

    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
