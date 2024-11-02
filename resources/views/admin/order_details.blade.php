@extends('admin.layout')
@section('title', 'Chi tiết đơn hàng')
@section('content')
<div class="main-content">
    <h3 class="title-page">Chi tiết đơn hàng</h3>
    <div class="order-details">
        <p><strong>ID:</strong> {{ $order->id }}</p>
        <p><strong>Tên người đặt:</strong> {{ $order->user_name }}</p>
        <p><strong>Email:</strong> {{ $order->user_email }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->user_phone }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->user_address }}</p>
        <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
    </div>
    @if($order->orderDetails && $order->orderDetails->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
            <tr>
                <td>{{ $detail->product_name }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>{{ $detail->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Không có chi tiết đơn hàng.</p>
    @endif
    <a href="{{ route('orders') }}" class="btn btn-primary">Quay lại danh sách đơn hàng</a>
</div>
@endsection
