<?php
//user
use Inertia\Inertia;
use App\Models\Booking;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
//admin
use App\Http\Controllers\User\TableController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\OrderItemController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminTablesController;
use App\Http\Controllers\Admin\AdminBookingsController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminCategoriesController;

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

// Router all fix ở đây nhé
Route::get('/register', function () {
    return Inertia::render('Register');
})->name('admin.register');

Route::get('/login', function () {
    return Inertia::render('Login');
})->name('admin.login');

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');


Route::get('/menu', function () {
    return Inertia::render('Menu');
})->name('menu');

Route::get('/details/{id}', function ($id) {
    $product = Product::with('category.products')->find($id);

    if (!$product) {
        abort(404, 'Product not found');
    }

    return Inertia::render('Details', [
        'product' => $product,
        'relatedProducts' => $product->category->products->where('id', '!=', $id)->take(4), // Lấy sản phẩm liên quan
    ]);
})->name('details');


Route::get('/payment', function () {
    return Inertia::render('Payment');
})->name('payment');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');


Route::get('/blog', function () {
    return Inertia::render('Blog');
})->name('blog');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/booktable', function () {
    return Inertia::render('BookTable');
})->name('booktable');


Route::get('/cart', function () {
    return Inertia::render('Cart');
})->name('cart');

Route::get('/products', function () {
    $products = Product::all(); // Lấy tất cả sản phẩm
    $categories = Category::all(); // Lấy tất cả danh mục

    return Inertia::render('Products', [
        'products' => $products,
        'categories' => $categories,
    ]);
})->name('products');

Route::get('/checkout', function () {
    return Inertia::render('Checkout');
})->name('checkout');

Route::get('api/menu', function () {
    $categories = Category::with('products')->get();
    return response()->json($categories);
});


Route::get('/payment/{bookingId}', function ($bookingId) {
    $booking = Booking::findOrFail($bookingId);
    $orderItems = OrderItem::where('booking_id', $bookingId)->get();
    $totalAmount = $orderItems->sum(function ($item) {
        return $item->quantity * $item->price;
    });
    return Inertia::render('Payment', compact('booking', 'orderItems', 'totalAmount'));
})->name('payment');
Route::post('/payment/confirm', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');


Route::post('register', [UserController::class, 'register'])->name('admin.register.submit');
Route::post('/login', [UserController::class, 'login'])->name('admin.login.submit');
Route::get('orders/history', function () {
    $user = Auth::user();
    if ($user === null) {
        return redirect()->route('admin.login')->with([
            'success' => true,
            'message' => 'Phải đăng nhập ',
        ]);
    }
    $orders = OrderItem::where('user_id', $user->id)->get();
    return Inertia::render('HistoryOrder', compact('orders'));
})->name('orders.history');

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

    //Categories
    Route::get('/categories', [AdminCategoriesController::class, 'index'])->name('admin.categorys'); // Danh sách danh mục
    Route::get('/categories/create', [AdminCategoriesController::class, 'create'])->name('admin.addcategory'); // Thêm danh mục
    Route::post('/categories', [AdminCategoriesController::class, 'store'])->name('admin.storecategory'); // Xử lý thêm danh mục
    Route::get('/categories/{id}/edit', [AdminCategoriesController::class, 'edit'])->name('admin.editcategory'); // Sửa danh mục
    Route::put('/categories/{id}', [AdminCategoriesController::class, 'update'])->name('admin.updatecategory'); // Cập nhật danh mục
    Route::delete('/categories/{id}', [AdminCategoriesController::class, 'destroy'])->name('admin.destroycategory'); // Xóa danh mục
    //end
    // Routes cho người dùng
    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users.index'); // Danh sách người dùng
    Route::get('/users/create', [AdminUsersController::class, 'create'])->name('admin.users.create'); // Thêm người dùng
    Route::post('/users', [AdminUsersController::class, 'store'])->name('admin.users.store'); // Xử lý thêm người dùng
    Route::get('/users/{id}/edit', [AdminUsersController::class, 'edit'])->name('admin.users.edit'); // Sửa người dùng
    Route::put('/users/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update'); // Cập nhật người dùng
    Route::delete('/users/{id}', [AdminUsersController::class, 'destroy'])->name('admin.users.destroy'); // Xóa người dùng

    // Routes cho đặt bàn
    Route::get('/tables', [AdminTablesController::class, 'index'])->name('admin.tables.index');          // Danh sách bàn
    Route::get('/tables/create', [AdminTablesController::class, 'create'])->name('admin.tables.create');  // Thêm bàn mới
    Route::post('/tables', [AdminTablesController::class, 'store'])->name('admin.tables.store');          // Xử lý thêm bàn
    Route::get('/tables/{id}/edit', [AdminTablesController::class, 'edit'])->name('admin.tables.edit');   // Sửa thông tin bàn
    Route::put('/tables/{id}', [AdminTablesController::class, 'update'])->name('admin.tables.update');    // Cập nhật thông tin bàn
    Route::delete('/tables/{id}', [AdminTablesController::class, 'destroy'])->name('admin.tables.destroy'); // Xóa bàn
    // Trong web.php
    Route::get('/table/{id}/details', [AdminTablesController::class, 'showDetails'])->name('table.details');

    // Route lưu đơn hàng
    Route::get('orders/create', [AdminOrdersController::class, 'create'])->name('orders.create');
    Route::post('/bookings/{booking}/order', [AdminOrdersController::class, 'store'])->name('bookings.order.store');
    Route::post('/orders', [AdminOrdersController::class, 'store'])->name('orders.store');

    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{orderId}', [AdminOrdersController::class, 'show'])->name('orders.show');
    Route::put('/orders/{id}/updateStatus', [AdminOrdersController::class, 'updateOrderStatus'])->name('orders.updateStatus');
});
