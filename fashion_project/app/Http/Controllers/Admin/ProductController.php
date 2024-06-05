<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\ProductCategory;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $search = $request->get('search');

        $products = Products::where('name', 'like', "%{$search}%")->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy tất cả các thương hiệu
        $brands = Brands::all();

        // Lấy tất cả các danh mục sản phẩm
        $productCategories = ProductCategory::all();
        return view('admin.product.create', compact('brands', 'productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lấy tất cả dữ liệu từ request
        $data = $request->all();
        $data['qty'] = 0;
        // Tạo một sản phẩm mới với dữ liệu đã lấy
        $product = Products::create($data);

       return redirect('admin/product/' . $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tìm san pham sản phẩm theo id
        $product = Products::findOrFail($id);

        $brands = Brands::all();
        $productCategories = ProductCategory::all();

        // Trả về view chỉnh sửa với thông tin sp
        return view('admin.product.edit', compact('product', 'brands', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $product = Products::findOrFail($id);
        $product->update($data);
        return redirect('admin/product/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect('admin/product');
    }
}
