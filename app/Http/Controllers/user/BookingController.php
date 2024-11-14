<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Booking;

class BookingController extends Controller
{
    // Hiển thị form đặt bàn
    public function create()
    {
        // Lấy danh sách bàn trống
        $tables = Table::where('status', 'available')->get();
        return view('users.booking_create', compact('tables'));
    }

    // Lưu thông tin đặt bàn

    public function store(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập và hiển thị thông báo lỗi
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để đặt bàn.');
        }
    
        // Kiểm tra dữ liệu đầu vào
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'name' => 'required|string|max:255',  // Thêm validation cho name
            'phone' => 'required|string|max:15',  // Thêm validation cho phone
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'number_of_guests' => 'required|integer|min:1',
            
        ]);
    
        // Kiểm tra trạng thái bàn
        $table = Table::find($request->table_id);
        if ($table->status !== 'available') {
            return redirect()->back()->with('error', 'Bàn đã được đặt trước.');
        }
    
        // Lưu thông tin đặt bàn
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'name' => $request->name,  // Lưu tên người nhận
            'phone' => $request->phone,  // Lưu số điện thoại nhận
            'message' => $request->message,  // Lưu số điện thoại nhận
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'number_of_guests' => $request->number_of_guests,
            'payment_method' => 'Chưa xác định',
            'booking_status' => 'Chưa hoàn thành',
            'order_status' => 'Chưa thanh toán',
        ]);
    
        // Cập nhật trạng thái bàn
        $table->update(['status' => 'reserved']);
    
        // Hiển thị thông báo thành công và chuyển hướng
        return redirect()->route('datMon.create', $booking->id)->with('success', 'Đặt bàn thành công!');
    }
    
    
}
