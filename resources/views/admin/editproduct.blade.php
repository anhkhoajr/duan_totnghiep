@extends('admin.layout')
@section('title','Admin')
@section('content')
<div class="main-content">
<form action="{{ route('update',$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="exampleInputFile">Ảnh sản phẩm</label>
    <div class="custom-file">
        <input type="file" name="img" class="custom-file-input" id="img">
    </div>
    @if ($product->img)
        <img src="{{ asset('img/' . $product->img) }}" alt="{{ $product->name }}" class="mt-2" style="max-width: 200px;">
    @endif
</div>
    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
    </div>
    <div class="form-group">
        <label for="categories">Danh mục:</label>
        <select class="form-select" name="category_id" id="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price">Giá gốc:</label>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text">VNĐ</span>
            </div>
            <input type="text" name="price" id="price" class="form-control" value="{{ number_format($product->price,0,'.',',')}}">
        </div>
    </div>
    <div class="form-group">
    <label>Mô tả ngắn</label>
    <textarea class="form-control" name="description" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm" style="height: 78px;">{{ $product->description }}</textarea>
</div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>  
@endsection