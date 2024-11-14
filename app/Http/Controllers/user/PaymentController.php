<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\OrderItem;

class PaymentController extends Controller
{
    public function show($bookingId)
    {
        // Lấy thông tin booking và các order items của nó
        $booking = Booking::findOrFail($bookingId);
        $orderItems = OrderItem::where('booking_id', $bookingId)->get();

        // Tính tổng tiền
        $totalAmount = $orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        // Hiển thị trang thanh toán với thông tin đặt món và tổng tiền
        return view('users.payment', compact('booking', 'orderItems', 'totalAmount'));
    }
    public function confirm(Request $request, $bookingId)
    {
        // Lấy thông tin đặt bàn
        $booking = Booking::findOrFail($bookingId);
        $orderItems = OrderItem::where('booking_id', $bookingId)->get();
    
        // Kiểm tra phương thức thanh toán
        $paymentMethod = $request->paymentMethod;
    
        // Cập nhật phương thức thanh toán
        $booking->payment_method = $paymentMethod ?? 'Chưa xác định'; // Nếu không có phương thức, sẽ để là "Chưa xác định"
    
        // Cập nhật trạng thái đặt chỗ
        $booking->booking_status = 'Chưa hoàn thành'; // Đặt chỗ vẫn chưa hoàn thành cho đến khi thanh toán thành công
    
        if ($paymentMethod == 'credit_card') {
            // Xử lý thanh toán thẻ tín dụng (Sử dụng Stripe hoặc PayPal API)
            $cardNumber = $request->cardNumber;
            $expiryDate = $request->expiryDate;
            $cvv = $request->cvv;
    
            // Thực hiện thanh toán thẻ tín dụng
            $paymentSuccess = $this->processCreditCardPayment($cardNumber, $expiryDate, $cvv);
        } elseif ($paymentMethod == 'e_wallet') {
            // Xử lý thanh toán ví điện tử
            $walletNumber = $request->walletNumber;
    
            // Thực hiện thanh toán ví điện tử
            $paymentSuccess = $this->processEwalletPayment($walletNumber);
        } else {
            // Thanh toán khi nhận hàng
            $paymentSuccess = true; // Thanh toán thành công ngay lập tức
        }
    
        // Nếu thanh toán thành công
        if ($paymentSuccess) {
            // Cập nhật trạng thái đơn hàng
            $booking->order_status = 'Đã thanh toán';
    
            // Cập nhật trạng thái đặt chỗ là hoàn thành
            $booking->booking_status = 'Hoàn thành';
    
            $booking->save();
    
            return redirect()->route('home')->with('success', 'Thanh toán thành công!');
        } else {
            // Nếu thanh toán không thành công
            $booking->order_status = 'Thanh toán thất bại'; // Đơn hàng chưa thành công
    
            $booking->save();
    
            return back()->with('error', 'Thanh toán thất bại. Vui lòng thử lại!');
        }
    }
    
    
}
