<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate input trước khi xử lý đăng nhập
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Lấy thông tin email và mật khẩu từ request
        $credentials = $request->only('email', 'password');

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Lấy user hiện tại sau khi đăng nhập thành công
            $user = Auth::user();

            // Kiểm tra role và chuyển hướng dựa trên vai trò của người dùng
            if ($user->role === 'admin') {
                return redirect()->route('admin.home'); // Đảm bảo 'admin.home' đã được định nghĩa
            } else {
                return redirect()->route('home'); // Đảm bảo 'home' đã được định nghĩa
            }
        }

        // Nếu đăng nhập thất bại, quay lại trang đăng nhập với thông báo lỗi và giữ lại email
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->withInput();
    }

    // Xử lý đăng xuất
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('admin.login'); // Chuyển hướng về trang đăng nhập
    }
}
