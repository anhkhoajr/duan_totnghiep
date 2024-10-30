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
                <th>Name</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Mô tả</th>
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
                <td>{{ $item->price }}</td>
                <td>{{ $item->sale_price }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('edit', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <a href="{{ route('destroy', $item->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();"><i class="fa-solid fa-trash"></i> Xóa</a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('destroy', $item->id) }}" method="POST" style="display: none;">
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
                <th>Name</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Mô tả</th>
                <th>Sửa/Xóa</th>
            </tr>
        </tfoot>
    </table>

</div>
<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000); // 2000 milliseconds = 2 seconds
</script>
@endsection
