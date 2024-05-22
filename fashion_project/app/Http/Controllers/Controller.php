<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Products;

abstract class Controller
{
    //
    public function index(){
        $menProducts = Products::where('featured', true)->where('product_category_id', 1)->get();
        $womenProducts = Products::where('featured', true)->where('product_category_id', 2)->get();
        $blogs = Blogs::latest()->take(3)->get();

        return view('front.index', compact('menProducts', 'womenProducts', 'blogs'));
    }
}
