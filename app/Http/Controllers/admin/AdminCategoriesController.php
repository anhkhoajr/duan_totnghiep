<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category; // Đảm bảo rằng bạn đã tạo model Category
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = Category::all();
        return view('admin.category_list', compact('categories'));
    }

    // Hiển thị form thêm danh mục
    public function create()
    {
        return view('admin.category_add');
    }

    // Xử lý thêm danh mục
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categorys')->with('success', 'Category created successfully.');
    }

    // Hiển thị form sửa danh mục   
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category_edit', compact('category'));
    }

    // Xử lý cập nhật danh mục
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categorys')->with('success', 'Category updated successfully.');
    }

    // Xóa danh mục
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        // Chuyển hướng về trang danh sách danh mục với thông báo thành công
        return redirect()->route('admin.categorys')->with('success', 'Category deleted successfully.');
    }
    
}

