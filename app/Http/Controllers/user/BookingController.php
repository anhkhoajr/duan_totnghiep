<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để đặt bàn.');
        }

        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'phone' => 'required|string|max:15',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'number_of_guests' => 'required|integer|min:1',
        ]);

        $table = Table::find($request->table_id);
        if ($table->status !== 'available') {

            return redirect()->back()->with('error', 'Bàn đã được đặt trước.');
        }
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'number_of_guests' => $request->number_of_guests,
            'booking_status' => 'Chưa hoàn thành',
            'order_status' => 'Đã thanh toán',
        ]);

        $table->update(['status' => 'reserved']);
        return response()->json(['success' => true, 'message' => 'Đặt bàn thành công!']);
    }
    public function current()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại từ Auth

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!$user) {
            return response()->json([
                'message' => 'Người dùng chưa đăng nhập.',
            ], 401);
        }

        $booking = Booking::where('user_id', $user->id)
            ->latest('id')
            ->first();

        if (!$booking) {
            return response()->json([
                'message' => 'Không tìm thấy thông tin đặt bàn.',
            ], 404);
        }

        return response()->json($booking, 200);
    }
    
}
