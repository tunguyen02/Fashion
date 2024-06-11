<?php

use App\Http\Controllers\Front\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin;

Route::get('/', [Front\HomeController::class, 'index']);


Route::prefix('shop')->group(function () {
    Route::get('/product/{id}', [Front\ShopController::class, 'show']);

    Route::post('/product/{id}', [Front\ShopController::class, 'postComment']);

    Route::get('/', [Front\ShopController::class, 'indexx']);

    Route::get('/{categoryName}', [Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function () {
    Route::get('add/{id}', [Front\CartController::class, 'add']);
    Route::get('/', [Front\CartController::class, 'index']);
    Route::get('delete/{rowId}', [Front\CartController::class, 'delete']);
    Route::get('/destroy', [Front\CartController::class, 'destroy']);
    Route::get('/update', [Front\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [Front\CheckOutController::class, 'index']);
    Route::post('/', [Front\CheckOutController::class, 'addOrder']);
    Route::get('/result', [Front\CheckOutController::class, 'result']);

});

Route::prefix('contact')->group(function (){
    Route::get('/', [Front\ContactController::class, 'index']);
});

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{id}', [BlogController::class, 'show'])->name('blog.show');
});

Route::prefix('account')->group(function (){
    Route::get('login', [Front\AccountController::class, 'login']);
    Route::post('login', [Front\AccountController::class, 'checkLogin']);
    Route::get('logout', [Front\AccountController::class, 'logout']);

    Route::get('register', [Front\AccountController::class, 'register']);
    Route::post('register', [Front\AccountController::class, 'postRegister']);
    Route::get('my-order', [Front\AccountController::class, 'myOrderIndex']);
    Route::get('my-order/{id}', [Front\AccountController::class, 'myOrderShow']);
});



//Admin
Route::prefix('admin')->group(function (){
    Route::redirect('', 'admin/user');

    Route::resource('user', Admin\UserController::class);
    Route::resource('category', Admin\ProductCategoryController::class);
    Route::resource('brand', Admin\BrandController::class);
    Route::resource('product/{product_id}/image', Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', Admin\ProductDetailController::class);
    Route::resource('product', Admin\ProductController::class);
    Route::resource('order', Admin\OrderController::class);


    Route::prefix('login')->group(function (){
        Route::get('',[Admin\HomeController::class, 'getLogin']);
        Route::post('',[Admin\HomeController::class, 'postLogin']);
    });

    Route::get('logout',[Admin\HomeController::class, 'logout']);
});
