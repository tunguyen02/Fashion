<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Products;
use App\Utilities\Common;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        // Lấy ID sản phẩm từ request
        $product_id = $request->route('product_id');

        // Tìm sản phẩm theo ID
        $product = Products::findOrFail($product_id);

        // Lấy tất cả các hình ảnh của sản phẩm
        $productImages = $product->productImages;

        // Trả về view với dữ liệu sản phẩm và hình ảnh sản phẩm
        return view('admin.product.image.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();

        //Xu ly file
        if($request->hasFile('image')) {
            $data['path'] = Common::uploadFile($request->file('image'), 'front/img/products');
            unset($data['image']);

            ProductImage::create($data);

        }
        return redirect('admin/product/' . $product_id . '/image');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id, $product_image_id)
    {
        //Xoa file
        $file_name = ProductImage::find($product_image_id)->path;
        if($file_name != ''){
            unlink('front/img/products/' . $file_name);
        }

        //Xoa ban ghi trong DB
        ProductImage::find($product_image_id)->delete();
        return redirect('admin/product/' . $product_id . '/image');
    }
}
