<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminProductsController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function products(Request $request)
    {
        $search = $request->input('search');
    
        // Ensure relationships `user` and `category` are defined in the Product model.
        $products = Product::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%");
        })
        ->with(['user', 'category']) // Ensure these relationships are defined
        ->paginate(10); // Number of products per page
    
        return view('admin.product_list', compact('products'));
    }
    
    
    // Hiển thị form thêm sản phẩm
    public function create()
    {
        // Lấy danh sách danh mục từ cơ sở dữ liệu
        $categories = Category::all(); // Giả sử bạn đã có model Category
    
        return view('admin.product_add', compact('categories')); // Truyền danh sách danh mục vào view
    }
    

    // Thêm sản phẩm mới
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'description' => 'nullable|string', // Cho phép description có thể NULL
        ]);
    
        // Logic lưu sản phẩm vào cơ sở dữ liệu
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price; // Gán giá trị sale_price
        $product->description = $request->description; // Gán giá trị description (có thể NULL)
        $product->user_id = auth()->id();
    
        // Xử lý ảnh sản phẩm
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $product->img = $filename;
        }
    
        $product->save();
    
        return redirect()->route('admin.productlist')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
    
    
    
    // Hiển thị form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Lấy sản phẩm theo ID
        $categories = Category::all(); // Lấy tất cả danh mục
    
        return view('admin.product_edit', compact('product', 'categories')); // Truyền sản phẩm và danh mục vào view
    }

    // Cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $request->merge([
            'price' => preg_replace('/[^\d.]/', '', $request->price),
            'sale_price' => preg_replace('/[^\d.]/', '', $request->sale_price),
        ]);
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric', // Đảm bảo giá trị này là số
            'sale_price' => 'nullable|numeric', // Đảm bảo giá trị này có thể là số hoặc null
            'description' => 'nullable|string',
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
    
        // Chuyển đổi giá trị từ chuỗi sang số
        $product->price = (float) preg_replace('/[^\d.]/', '', $request->price);
        
        // Kiểm tra và gán giá trị sale_price
        if ($request->sale_price !== null && $request->sale_price !== '') {
            $product->sale_price = (float) preg_replace('/[^\d.]/', '', $request->sale_price);
        } else {
            $product->sale_price = null; // Hoặc bạn có thể bỏ qua dòng này nếu trường cho phép giá trị null
        }
    
        // Xử lý hình ảnh
        if ($request->hasFile('img')) {
            // Xóa ảnh cũ nếu có
            if ($product->img) {
                Storage::delete('img/' . $product->img);
            }
    
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $product->img = $filename;
        }
    
        $product->description = $request->description;
        $product->save();
    
        return redirect()->route('admin.productlist')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }
    
    
    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.productlist')->with('success', 'Xóa sản phẩm thành công');
    }
}
