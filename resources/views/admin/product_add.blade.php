@extends('layoutAdmin.layout')
@section('title', 'Thêm sản phẩm')
@section('content')
<div class="main-content">
    <h3 class="title-page">Thêm sản phẩm</h3>
    <form class="addPro" action="{{ route('admin.storeproduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="exampleInputFile" required>
                <label class="custom-file-label" for="exampleInputFile">Chọn tệp</label>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="categories_id" aria-label="Default select example" required>
                <option value="">Chọn danh mục</option>
                @foreach($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('categories_id'))
                <span class="text-danger">{{ $errors->first('categories_id') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc" required>
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="sale_price">Giá khuyến mãi:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="sale_price" id="sale_price" class="form-control" placeholder="Nhập giá khuyến mãi">
                @if ($errors->has('sale_price'))
                    <span class="text-danger">{{ $errors->first('sale_price') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả ngắn</label>
            <textarea class="form-control" name="description" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px;">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <a href="{{ route('admin.productlist') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection
