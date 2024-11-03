<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Table;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminTablesController extends Controller
{
    // Hiển thị danh sách bàn
    public function index()
    {
        $tables = Table::all();
        return view('admin.table_list', compact('tables'));
    }

    // Hiển thị form thêm bàn mới
    public function create()
    {
        return view('admin.table_add');
    }

    // Lưu thông tin bàn mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status' => 'required|string',
        ]);

        Table::create($request->all());
        return redirect()->route('admin.tables.index')->with('success', 'Bàn mới đã được thêm.');
    }

    public function showDetails($id)
    {
        $table = Table::with('bookings.orderItems.product', 'bookings.user')->findOrFail($id);
        $products = Product::all();
        return view('admin.table_show', compact('table','products'));
    }
    
    
    // Hiển thị form chỉnh sửa thông tin bàn
    public function edit($id)
    {
        $table = Table::findOrFail($id);
        return view('admin.table_edit', compact('table'));
    }

    // Cập nhật thông tin bàn
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status' => 'required|string',
        ]);
    
        // Find the table by ID or fail with a 404 error
        $table = Table::findOrFail($id);
    
        // Update the table information
        $table->update($request->all());
    
        // Redirect to the index route after update or to the specific table's show route
        return redirect()->route('admin.tables.index')->with('success', 'Thông tin bàn đã được cập nhật.'); // Điều hướng đến danh sách bàn
    }
    

    // Xóa bàn
    public function destroy($id)
    {
        $table = Table::findOrFail($id); // Tìm bàn theo ID hoặc trả về 404 nếu không tìm thấy
        $table->delete(); // Xóa bàn
    
        // Redirect to the index route after deletion
        return redirect()->route('admin.tables.index')->with('success', 'Bàn đã được xóa.'); // Điều hướng đến danh sách bàn
    }
    
    
}
