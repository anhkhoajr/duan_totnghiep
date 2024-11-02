@extends('admin.layout')
@section('title','Admin')
@section('content')
<div class="main-content">
    <h3 class="title-page">
        Sản phẩm
    </h3>
    <div class="d-flex justify-content-start">
        <form class="form-search" action="{{ route('productlist') }}">
            <fieldset class="name">
                <input type="text" placeholder="Tìm kiếm..." name="search" tabindex="2" value="{{ request()->query('search') }}" aria-required="true" required>
            </fieldset>

        </form>
    </div>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>address</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><a class="text-dark" href="{{ route('orderdetails', $item->id) }}">{{ $item->user_name }}</a></td>
                <td>{{$item->user_email}}</td>
                <td>{{$item->user_phone}}</td>
                <td>{{$item->user_address}}</td>
                <td>{{$item->user_address}}</td>
                <td>
                    <form action="{{ route('updateStatus', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()">
                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>đang chờ xử lý</option>
                            <option value="prepare" {{ $item->status == 'prepare' ? 'selected' : '' }}>chuẩn bị</option>
                            <option value="shipping" {{ $item->status == 'shipping' ? 'selected' : '' }}>vận chuyển</option>
                            <option value="success" {{ $item->status == 'success' ? 'selected' : '' }}>thành công</option>
                            <option value="cancel" {{ $item->status == 'cancel' ? 'selected' : '' }}>hủy</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form action="{{ route('deleteOrder', $item->id) }}" method="POST" style="display:inline-block;" class="btn btn-danger">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?');">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>img</th>
                <th>price</th>
                <th>Start date</th>
                <th>Sửa/Xóa</th>
            </tr>
        </tfoot>
        </tfoot>
    </table>
</div>
<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000); // 3000 milliseconds = 3 seconds
</script>
@endsection