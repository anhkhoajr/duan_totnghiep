@extends('layoutAdmin.layout')
@section('title', 'Thêm Danh Mục')

@section('content')
<div class="main-content">
    <h3 class="title-page">Thêm Danh Mục Mới</h3>
    <div class="container">
        <form action="{{ route('admin.storecategory') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('admin.categorys') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection
