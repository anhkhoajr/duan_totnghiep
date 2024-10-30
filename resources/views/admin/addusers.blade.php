@extends('admin.layout')

@section('title', 'Quản trị')

@section('content')
<div class="main-content">
    <h3 class="title-page">Thêm Người Dùng</h3>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form class="addPro" action="{{ route('storeuser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Tên Người Dùng:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên người dùng" value="{{ old('name') }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email người dùng" value="{{ old('email') }}" required>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Mật Khẩu:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu người dùng" required>
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirm_password">Xác Nhận Mật Khẩu:</label>
            <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Xác nhận mật khẩu người dùng" required>
        </div>
        <div class="form-group">
            <label for="role">Vai Trò:</label>
            <select class="form-select" name="role" aria-label="Default select example" required>
                <option value="0" {{ old('role') == '0' ? 'selected' : '' }}>Người Dùng</option>
                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Quản Trị Viên</option>
            </select>
            @error('role')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Gửi</button>
        </div>
    </form>
</div>
@endsection
