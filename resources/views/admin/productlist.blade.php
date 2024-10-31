@extends('layoutAdmin.layout')
@section('title', 'Admin')
@section('content')
<div class="main-content">
    <h3 class="title-page">Sản phẩm</h3>
    <div class="d-flex justify-content-start">
        <form class="form-search" action="">
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
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.addproduct') }}" class="btn mb-2" style="background-color: #add8e6;">Thêm sản phẩm</a>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Mô tả</th>
                <th>Người dùng</th>
                <th>Danh mục</th>
                <th>Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <img src="{{ asset('img/' . $item->img) }}" alt="" style="width: 100px; height: auto;">
                </td>
                <td>{{ number_format($item->price, 0, '.', ',') }}</td>
                <td>{{ number_format($item->sale_price, 0, '.', ',') }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->user->name ?? 'Không xác định' }}</td> <!-- Hiển thị tên người dùng -->
                <td>{{ $item->category->name ?? 'Không xác định' }}</td> <!-- Hiển thị tên danh mục -->
                <td>
                    <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="{{ route('admin.destroy', $item->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();"><i class="fa-solid fa-trash"></i> Xóa</a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Mô tả</th>
                <th>Người dùng</th>
                <th>Danh mục</th>
                <th>Sửa/Xóa</th>
            </tr>
        </tfoot>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $products->links() }} <!-- Phân trang -->
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000); // 2000 milliseconds = 2 seconds
</script>
@endsection
