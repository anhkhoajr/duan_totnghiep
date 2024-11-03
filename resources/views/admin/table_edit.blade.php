@extends('layoutAdmin.layout')
@section('title', 'Sửa Thông Tin Bàn')

@section('content')
<div class="main-content">
    <h3 class="title-page">Sửa Thông Tin Bàn</h3>
    
    <form action="{{ route('admin.tables.update', $table->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type" class="form-label">Loại Bàn</label>
            <select class="form-control" id="type" name="type" required>
                <option value="Vip" {{ old('type', $table->type) == 'Vip' ? 'selected' : '' }}>Vip</option>
                <option value="Thường" {{ old('type', $table->type) == 'Thường' ? 'selected' : '' }}>Thường</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Sức Chứa</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity', $table->capacity) }}" required min="1" max="10"> <!-- Giới hạn sức chứa từ 1 đến 10 -->
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng Thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="available" {{ old('status', $table->status) == 'available' ? 'selected' : '' }}>Trống</option>
                <option value="reserved" {{ old('status', $table->status) == 'reserved' ? 'selected' : '' }}>Đã Đặt</option>
                <option value="cleaning" {{ old('status', $table->status) == 'cleaning' ? 'selected' : '' }}>Đang Dọn Dẹp</option>
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.tables.index') }}" class="btn btn-secondary ms-2">Hủy</a>
        </div>
    </form>
</div>
@endsection
