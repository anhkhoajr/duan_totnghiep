<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function confirmPayment(Request $request)
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'User is not authenticated.',
            ], 401);
        }

        // Validate request data
        $validated = $request->validate([
            'payment_method' => 'required|in:cash,bank',
            'bank' => 'required_if:payment_method,bank',
            'amount' => 'required|numeric',
            'menuCode' => 'required|string',
            'status' => 'nullable|in:completed,pending,failed',
        ]);

        // Default status
        $status = $validated['status'] ?? 'completed'; // Default status is 'pending'

       

        // Fetch the most recent booking for the current user
        $booking = Booking::where('user_id', $user->id)->latest()->first();

        // Check if the booking exists
        if (!$booking) {
            return response()->json([
                'message' => 'No booking found for this user.',
            ], 404);
        }
 // Fetch the user's products (assuming they are already selected or in a cart)
 $userProducts = Product::where('user_id', $user->id)->get();
 if ($userProducts->isEmpty()) {
     return response()->json([
         'message' => 'No products found for this user.',
     ], 404);
 }
        // Start transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Insert payment record into database
            $payment = Payment::create([
                'user_id' => $user->id, // Use current authenticated user
                'amount' => $validated['amount'],
                'menuCode' => $validated['menuCode'],
                'payment_method' => $validated['payment_method'],
                'status' => $status,
            ]);

            // Insert order_items into database for each product in the cart
            foreach ($userProducts as $product) {
                OrderItem::create([
                    'booking_id' => $booking->id, // ID của booking
                    'product_id' => $product->id, // ID của sản phẩm
                    'user_id' => $user->id,       // ID của user
                    'quantity' => 1,              // Số lượng, có thể thay đổi tùy yêu cầu
                    'price' => $product->price,   // Giá sản phẩm (giả sử tồn tại trong model Product)
                ]);
            }
            

            DB::commit();

            return response()->json([
                'message' => 'Payment confirmed and order items created successfully!',
                'payment' => $payment,
            ], 201);
        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();

            return response()->json([
                'message' => 'Failed to confirm payment!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
