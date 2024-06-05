<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $search = $request->get('search');

        $brands = Brands::where('name', 'like', "%{$search}%")->paginate(10);

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // Tạo mới một Brands
        Brands::create($data);
        return redirect('admin/brand');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tìm danh mục sản phẩm theo id
        $brand = Brands::findOrFail($id);

        // Trả về view chỉnh sửa với thông tin brand
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $brand = Brands::findOrFail($id);
        $brand->update($data);
        return redirect('admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brands::findOrFail($id);
        $brand->delete();

        return redirect('admin/brand');
    }
}
