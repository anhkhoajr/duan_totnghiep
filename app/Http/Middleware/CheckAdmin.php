<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa và có vai trò là admin không
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Nếu chưa, chuyển hướng đến trang đăng nhập
            return redirect()->route('admin.login')->withErrors(['message' => 'You must be an admin to access this page.']);
        }

        return $next($request);
    }
}

