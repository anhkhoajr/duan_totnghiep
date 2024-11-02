@extends('layoutAdmin.layout')
@section('title', 'Danh Mục')

@section('content')
<div class="main-content">
    <h3 class="title-page">Danh Mục</h3>
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.addproduct') }}" class="btn btn-primary mb-2">Thêm sản phẩm</a>
    </div>
    
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày cập nhật</th>
                <th>Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.editcategory', $item->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                    </a>
                    <form action="{{ route('admin.destroycategory', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i> Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ngày cập nhật</th>
                <th>Sửa/Xóa</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
