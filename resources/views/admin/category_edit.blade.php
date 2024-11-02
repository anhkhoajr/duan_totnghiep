@extends('layoutAdmin.layout')
@section('title', 'Sửa Danh Mục')

@section('content')
<div class="main-content">
    <h3 class="title-page">Sửa Danh Mục</h3>
    
    <form action="{{ route('admin.updatecategory', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.categorys') }}" class="btn btn-secondary ms-2">Hủy</a>
        </div>
    </form>
</div>
@endsection
