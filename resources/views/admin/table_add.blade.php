@extends('layoutAdmin.layout')
@section('title', 'Thêm Bàn Mới')

@section('content')
<div class="main-content">
    <h3 class="title-page">Thêm Bàn Mới</h3>
    
    <form action="{{ route('admin.tables.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Loại Bàn</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Vip">Vip</option>
                <option value="Thường">Thường</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Sức Chứa</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" min="1" max="10" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="available">Trống</option>
                <option value="reserved">Đã Đặt</option>
                <option value="cleaning">Đang Dọn Dẹp</option>
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Thêm Bàn</button>
            <a href="{{ route('admin.tables.index') }}" class="btn btn-secondary ms-2">Hủy</a>
        </div>
    </form>
</div>
@endsection
