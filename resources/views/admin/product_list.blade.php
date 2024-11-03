@extends('layoutAdmin.layout')
@section('title', 'Admin')
@section('content')
<div class="main-content">
    <h3 class="title-page">Sản phẩm</h3>
    <div class="d-flex align-items-center mb-3">
        <form class="form-search d-flex" action="{{ route('admin.productlist') }}" method="GET">
            <fieldset class="name me-2">
                <input type="text" 
                       placeholder="Tìm kiếm sản phẩm..." 
                       name="search" 
                       tabindex="2" 
                       value="{{ request()->query('search') }}" 
                       aria-required="true" 
                       class="form-control">
            </fieldset>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.addproduct') }}" class="btn btn-primary mb-2">Thêm sản phẩm</a>
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
                <td>{{ number_format($item->price, 0, '.', ',') }}đ</td>
                <td>{{ number_format($item->sale_price, 0, '.', ',') }}đ</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->user->name ?? 'Không xác định' }}</td>
                <td>{{ $item->category->name ?? 'Không xác định' }}</td>
                <td>
                    <a href="{{ route('admin.edit', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <button class="btn btn-danger" onclick="confirmDelete('{{ $item->id }}')">
                        <i class="fa-solid fa-trash"></i> Xóa
                    </button>
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
    <div class="d-flex justify-content-center my-4">
        @if ($products->hasPages())
        <nav aria-label="Page navigation">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                {{-- Pagination Elements --}}
                @foreach ($products->links() as $element)
                @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                @foreach ($element as $page => $url)
                <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        @endif
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
    function confirmDelete(id) {
        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

    // Hàm ẩn thông báo sau 2 giây
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 2000);
</script>
@endsection
