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
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$order->user->firstname .' '. $order->user->lastname}}</td>
                <td>{{$order->user->address}}</td>
                <td>{{$order->user->phone}}</td>

            @if($order->status == 1)
                    <td style="color: seagreen">Đơn hàng đã xác nhận</td>
                @else
                    <td style="color: red">Đơn hàng chưa xác nhận</td>
                @endif
                <td>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('orderDetails.index'))
                        <a style="float: left;margin-right: 5px" type="button" class="btn btn-info"
                           href="{{url('admin/orders/order-detail/'. $order->id)}}">Detail</a>
                    @endif

                    <select name="change">
                        <option value="0">Chuyển sang chưa xác nhận</option>
                        <option value="1">Xác nhận đơn hàng</option>
                    </select>
                    @if(Auth::guard('admin')->user()->hasPermissionTo('orders.destroy'))
                        <form method="POST" action="{{ route('orders.destroy', $order) }}">
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
