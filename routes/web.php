<?php
//user
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;

//admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// routes/web.php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menus', [ProductsController::class, 'showMenu'])->name('users.menus');
Route::get('/chitiet', [ProductsController::class, 'chitiet'])->name('users.chitiet');
Route::get('/cart', [CartController::class, 'cart'])->name('users.giohang');



// Route cho trang login admin (không sử dụng middleware 'auth' vì người dùng chưa đăng nhập)
Route::get('/login', [UserController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [UserController::class, 'login'])->name('admin.login.submit');

// Route cho đăng xuất (đặt trong nhóm có middleware 'auth')
Route::post('/logout', [UserController::class, 'logout'])->name('admin.logout');

// Các route của trang admin (được bảo vệ bởi middleware 'auth')

// Routes cho admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin.check'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categorys');
    //products
    Route::get('/products', [AdminProductsController::class, 'products'])->name('admin.productlist'); // Danh sách sản phẩm
    Route::get('/products/create', [AdminProductsController::class, 'create'])->name('admin.addproduct'); // Thêm sản phẩm
    Route::post('/products', [AdminProductsController::class, 'store'])->name('admin.storeproduct'); // Xử lý thêm sản phẩm
    Route::get('/products/{id}/edit', [AdminProductsController::class, 'edit'])->name('admin.edit'); // Sửa sản phẩm
    Route::put('/products/{id}', [AdminProductsController::class, 'update'])->name('admin.update'); // Cập nhật sản phẩm
    Route::delete('/products/{id}', [AdminProductsController::class, 'destroy'])->name('admin.destroy'); // Xóa sản phẩm
    //end
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
});



// Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
