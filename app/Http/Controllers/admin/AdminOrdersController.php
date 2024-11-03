<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Table;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class  AdminOrdersController extends Controller
{   
    public function create(Request $request)
    {
        // Lấy ID booking từ yêu cầu
        $currentBookingId = $request->query('booking_id'); 
        $booking = Booking::find($currentBookingId);
    
        // Kiểm tra nếu không tìm thấy đặt chỗ
    
        // Tiếp tục xử lý nếu $booking tồn tại
        $categories = Category::all();
        $currentTableId = $request->query('table_id'); 
        $table = Table::find($currentTableId);
    
        // Kiểm tra xem category_id có trong yêu cầu hay không
        if ($request->has('category_id')) {
            $products = Product::where('category_id', $request->category_id)->get();
        } else {
            $products = Product::all(); // Lấy tất cả sản phẩm nếu không có category_id
        }
    
        // Trả về view với danh sách danh mục, sản phẩm, bàn và booking
        return view('admin.order_list', compact('categories', 'products', 'table', 'booking', 'currentTableId', 'currentBookingId'));
    }
    
    
    
    
    public function store(Request $request, $bookingId)
    {
        // Lấy thông tin đặt chỗ
        $booking = Booking::find($bookingId);
    
        if (!$booking) {
            return redirect()->back()->with('error', 'Không tìm thấy đặt chỗ.');
        }
    
        // Xác thực dữ liệu
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        // Lấy thông tin món ăn
        $product = Product::find($request->product_id);
        $quantity = $request->quantity;
        $price = $product->price;
    
        // Kiểm tra xem món ăn đã tồn tại trong đơn hàng chưa
        $orderItem = $booking->orderItems()->where('product_id', $product->id)->first();
    
        if ($orderItem) {
            // Nếu đã tồn tại, cập nhật số lượng và tổng giá
            $orderItem->quantity += $quantity; // Tăng số lượng
            $orderItem->price = $price; // Cập nhật giá nếu cần
            $orderItem->save(); // Lưu lại thay đổi
        } else {
            // Nếu không tồn tại, tạo bản ghi mới
            $booking->orderItems()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }
    
        // Chuyển hướng về trang chi tiết của bàn với thông báo thành công
        return redirect()->route('table.details', ['id' => $booking->table_id])
            ->with('success', 'Món ăn đã được đặt thành công!');
    }
    
    
    
    
}

