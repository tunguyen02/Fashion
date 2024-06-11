<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blogs; // Giả sử bạn có model Blog
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::all(); // Lấy tất cả blog từ database
        return view('front.blog.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blogs::findOrFail($id);
        $previous = Blogs::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $next = Blogs::where('id', '>', $blog->id)->orderBy('id')->first();
        return view('front.blog.show', compact('blog', 'previous', 'next'));
    }
}
