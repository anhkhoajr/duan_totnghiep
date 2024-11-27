<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\User\BookingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('products', ProductController::class);
Route::get('products/category/{category_id}', [ProductController::class, 'showByCategory']);



// Api register & login thay vào controller giúp mik
Route::post('/register', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Đăng ký thành công',
        'user' => $user,
    ]);
});



Route::post('/login', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);
    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password.',
            'errors' => $validator->errors()
        ], 422);
    }

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
    ], $request->remember)) {
        $request->session()->regenerate();
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful.',
        ]);
    }

    return response()->json([
        'status' => 'error',
        'message' => 'Invalid credentials.',
    ], 401);
})->name('login');

Route::get('/menu', function () {
    $categories = Category::with('products')->get();
    return response()->json($categories);
});
Route::get('products', function () {
    $productsData = Product::limit(5)->get();
    return response()->json($productsData);
});
Route::resource('booktable', BookingController::class);

use Illuminate\Support\Facades\DB;



Route::get('/products', function () {
    $products = DB::table('products')->get();

    return response()->json($products);
});
Route::get('/categories', function () {
    $categories = DB::table('categories')->get();

    return response()->json($categories);
});

Route::get('/menu', function (Request $request) {
    // Lấy danh sách sản phẩm thuộc danh mục cụ thể
    $categoryId = $request->input('category_id');
    $products = DB::table('products')
        ->where('category_id', $categoryId)
        ->get();

    return response()->json($products);
});
