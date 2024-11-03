@extends('layoutAdmin.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Thêm món ăn cho bàn: {{ $booking->id }}</h1>
    <!-- Hiển thị danh mục sản phẩm -->
    <h2 class="mt-4">Danh mục sản phẩm</h2>
    <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <strong>{{ $category->name }}</strong>
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseCategory{{ $category->id }}" aria-expanded="false" aria-controls="collapseCategory{{ $category->id }}">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
                <div class="collapse" id="collapseCategory{{ $category->id }}">
                    <ul class="list-group mt-2">
                        @foreach ($products->where('category_id', $category->id) as $product)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $product->name }} - ${{ number_format($product->price) }}
                                </div>
                                <!-- Form để thêm sản phẩm vào đơn hàng -->
                                <form action="{{ route('bookings.order.store', ['booking' => $booking->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" class="form-control d-inline" min="1" value="1" style="width: 60px;" required>
                                    <button type="submit" class="btn btn-primary">Thêm vào đơn</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<!-- Thêm Font Awesome cho icon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
