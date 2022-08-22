@extends('admin::dashboard.base')

@section('title', 'Tomosia')
@section('linkUrl','orders / detail')
@section('headerText','Thông tin order')
@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userFinds as $user)
            <tr>
                <td>{{$user->user->firstname}}</td>
                <td>{{$user->user->phone}}</td>
                <td>{{$user->user->address}}</td>
                <td>{{$user->user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>

        </tr>
        </thead>
        <tbody>
        @foreach($orderDetails as $order)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$order->product->name}}</td>
                <td>{{number_format($order->product->price)}} VND</td>
                <td>{{$order->quantity}}</td>
                <td>{{number_format($order->quantity * $order->product->price)}} VND</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>

        @php $total = 0 @endphp
        @foreach($orderDetails as $order)
            @php $total += $order->product->price*$order->quantity @endphp
        @endforeach
        <td style="position:absolute; right: 190px"><span style="color: #058cb1; float: right">Tổng tiền thanh toán: {{ number_format($total) }} VND</span>
        </td>
        </tfoot>
    </table>

    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection
