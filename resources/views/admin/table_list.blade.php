@extends('layoutAdmin.layout')

@section('title', 'Danh sách bàn')
@section('content')
<div class="main-content">
    <h3 class="title-page">Danh sách bàn</h3>

    <div class="d-flex align-items-center mb-3">
        <form class="form-search d-flex" action="{{ route('admin.tables.index') }}" method="GET">
            <input type="text" placeholder="Tìm kiếm bàn..." name="search" value="{{ request()->query('search') }}" class="form-control me-2" style="width: 250px;" aria-required="true">
            <button type="submit" class="btn btn-primary">Tìm</button>
            <a href="{{ route('admin.tables.create') }}" class="btn btn-success ms-2">Thêm Bàn</a>
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
                <th>Loại Bàn</th>
                <th>Sức Chứa</th>
                <th>Trạng Thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{ $table->id }}</td>
                    <td>{{ $table->type }}</td>
                    <td>{{ $table->capacity }}</td>
                    <td>
                        @if($table->isReserved())
                            <span class="badge bg-warning">Đã Đặt</span>
                        @else
                            <span class="badge bg-success">Trống</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.tables.edit', $table->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.tables.destroy', $table->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa bàn này không?');">Xóa</button>
                        </form>
                                @foreach($table->bookings as $booking)
                                    <a href="{{ route('table.details', ['id' => $table->id]) }}" class="btn btn-info ms-2">Xem Chi Tiết Đặt Bàn #{{ $table->id }}</a>
                                @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Hàm ẩn thông báo sau 3 giây
    setTimeout(function() {
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000); // 3000 milliseconds = 3 seconds
</script>
@endsection
