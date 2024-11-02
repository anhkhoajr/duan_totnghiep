<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Lấy danh sách sản phẩm
    public function index()
    {
        return Product::all();
    }

    // Lấy chi tiết một sản phẩm
    public function show($id)
    {
        return Product::findOrFail($id);
    }

    // Tạo mới sản phẩm
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric',
            'image' => 'nullable|string',
        ]);

        $product->update($request->all());
        return response()->json($product, 200);
    }

    // Xóa sản phẩm
    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}

