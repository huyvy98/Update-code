@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','categories')
@section('headerText','Quản lý danh mục')
@section('content')
    @if(Auth::guard('admin')->user()->hasPermissionTo('products.create'))
        <a style="float: right;margin-bottom: 5px" type="button" class="btn btn-primary"
           href="{{route('categories.create')}}">Add New</a>
    @endcan

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('products.edit'))
                        <a style="float: left;margin-right: 5px" type="button" class="btn btn-warning"
                           href="{{ route('categories.edit' , $category)}}">Edit</a>
                    @endif
                    @if(Auth::guard('admin')->user()->hasPermissionTo('products.destroy'))
                        <form method="POST" action="{{ route('categories.destroy', $category) }}">
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
    {{ $categories->links() }}
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>

    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
