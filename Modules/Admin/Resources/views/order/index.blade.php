@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('headerText','Quản lý order')
@section('content')
    {{--    <a style="float: right;margin-bottom: 5px" type="button" class="btn btn-primary"--}}
    {{--       href="{{route('products.create')}}">Add New</a>--}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên người đặt hàng</th>
            <th scope="col">Trạng thái</th>
            <th>San pham</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$order->user->firstname}}</td>
                @if($order->status ==1)
                    <td>Xác nhận</td>
                @else
                    <td>Chưa xác nhận</td>
                @endif
                <td>{{$order->orderDetails}}</td>
                <td>
                    <form method="POST" action="{{ route('orders.destroy', $order) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$orders->links()}}
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>

    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
