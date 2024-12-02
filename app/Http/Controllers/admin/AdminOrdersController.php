<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Table;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\OrderItem;

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
            $orderItem->quantity += $quantity; // Tăng số lượng
            $orderItem->price = $price; // Cập nhật giá nếu cần
            $orderItem->save(); // Lưu lại thay đổi
        } else {
            $booking->orderItems()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }

        return redirect()->route('table.details', ['id' => $booking->table_id])
            ->with('success', 'Món ăn đã được đặt thành công!');
    }
    public function index(Request $request)
    {
        $orders = OrderItem::all();

        return view('admin.order_details', compact('orders'));
    }
    public function updateOrderStatus(Request $request, $id)
    {
        $order = OrderItem::find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
        }

        $status = $request->input('status'); // Lấy giá trị từ form (1 hoặc 2)

        if ($status == 1) {
            $order->status = 1; // Xác nhận đơn hàng
        } elseif ($status == 2) {
            $order->status = 2; // Hủy đơn hàng
        } else {
            return redirect()->back()->with('error', 'Trạng thái không hợp lệ.');
        }
        $order->save();
        return redirect()->back()
            ->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
}
