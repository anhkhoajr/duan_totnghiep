@extends('layoutAdmin.layout')
@section('title', 'Chỉnh sửa sản phẩm')
@section('content')
<div class="main-content">
    <h3 class="title-page">Chỉnh sửa sản phẩm</h3>
    <form action="{{ route('admin.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="img">
                <label class="custom-file-label" for="img">Chọn tệp</label>
            </div>
            @if ($product->img)
                <img src="{{ asset('img/' . $product->img) }}" alt="{{ $product->name }}" class="mt-2" style="max-width: 200px;">
            @endif
        </div>

        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="category_id" id="categories_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('category_id'))
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">VNĐ</span>
                </div>
                <input type="text" name="price" id="price" class="form-control" value="{{ old('price', number_format($product->price, 0, '.', ',')) }}" required>
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="sale_price">Giá khuyến mãi:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">VNĐ</span>
                </div>
                <input type="text" name="sale_price" id="sale_price" class="form-control" value="{{ old('sale_price', number_format($product->sale_price, 0, '.', ',')) }}">
                @if ($errors->has('sale_price'))
                    <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px;">{{ old('description', $product->description) }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
            <a href="{{ route('admin.productlist') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>

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
@endsection
