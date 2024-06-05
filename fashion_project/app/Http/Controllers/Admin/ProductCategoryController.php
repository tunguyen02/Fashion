<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $search = $request->get('search');

        $productCategories = ProductCategory::where('name', 'like', "%{$search}%")->paginate(10);

        return view('admin.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // Tạo mới một ProductCategory
        ProductCategory::create($data);
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tìm danh mục sản phẩm theo id
        $productCategory = ProductCategory::findOrFail($id);

        // Trả về view chỉnh sửa với thông tin danh mục sản phẩm
        return view('admin.category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->update($data);
        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        return redirect('admin/category');
    }
}
