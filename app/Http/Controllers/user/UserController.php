<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Lưu mật khẩu đã được mã hóa
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please login.');
    }

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
            'password' => 'required|min:8',
        ]);

        // Lấy thông tin email và mật khẩu từ request
        $credentials = $request->only('email', 'password');

        // Kiểm tra thông tin đăng nhập bằng cách sử dụng Auth::attempt
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, lấy user hiện tại
            $user = Auth::user();

            // Kiểm tra vai trò và chuyển hướng dựa trên vai trò của người dùng
            if ($user->role === 'admin') {
                return redirect()->route('admin.home'); // Đảm bảo route 'admin.home' đã được định nghĩa
            } else {
                return redirect()->route('home'); // Đảm bảo route 'home' đã được định nghĩa
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
        return redirect()->route('home'); // Chuyển hướng về trang đăng nhập
    }
}
