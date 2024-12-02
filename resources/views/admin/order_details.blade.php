@extends('layoutAdmin.layout')
@section('title', 'Quản lý đơn hàng')
@section('content')
<div class="main-content">
    <h3 class="title-page">Danh sách đơn hàng</h3>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên người đặt</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product->name }}</td>
                <td>
                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Đang chờ xác nhận</option>
                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Xác nhận đơn hàng</option>
                            <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Hủy đơn hàng</option>
                        </select>
                    </form>
                </td>
                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Xem chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
