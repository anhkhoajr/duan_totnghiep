<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductsController extends Controller
{
    public function products() {
        // Lấy danh sách sản phẩm từ cơ sở dữ liệu
        $products = DB::table('products')->get();
        
        return view('admin.productlist', compact('products')); // Truyền danh sách sản phẩm vào view
    }
    public function create() {
        return view('admin.create-product'); // Form thêm sản phẩm
    }
    
    public function store(Request $request) {
        // Logic thêm sản phẩm vào cơ sở dữ liệu
    }
    
    public function edit($id) {
        // Logic lấy thông tin sản phẩm để hiển thị trong form sửa
    }
    
    public function update(Request $request, $id) {
        // Logic cập nhật sản phẩm
    }
    
    public function destroy($id) {
        // Logic xóa sản phẩm
    }
}
