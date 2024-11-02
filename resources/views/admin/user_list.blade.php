@extends('layoutAdmin.layout')

@section('title', 'Danh sách người dùng')

@section('content')
<div class="main-content">
    <h3 class="title-page">Danh sách người dùng</h3>

    <div class="d-flex align-items-center mb-3">
    <form class="form-search d-flex" action="{{ route('admin.users.index') }}" method="GET">
        <input type="text" placeholder="Tìm kiếm..." name="search" value="{{ request()->query('search') }}" class="form-control me-2" aria-required="true" style="width: 250px;">
        <button type="submit" class="btn btn-primary">Tìm</button>
        <a href="{{ route('admin.users.create') }}" class="btn btn-success ms-2">Thêm</a>
    </form>
</div>


    @if(session('success'))
        <div id="successMessage" class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Vai trò</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Phân trang --}}
    <div class="mt-3">
        {{ $users->links() }} {{-- Hiển thị phân trang --}}
    </div>
</div>
<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 3000); // 3000 milliseconds = 3 seconds
</script>
@endsection
