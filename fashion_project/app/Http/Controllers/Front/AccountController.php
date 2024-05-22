<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orders;

class AccountController extends Controller
{
    public function login(){
        return view('front.account.login');
    }
    public function checkLogin(Request $request){
        $credentials = [
            'email' => $request->email,
            'password'=> $request->password,
            'level' => Constant::user_level_client, //Tai khoan cap do khach hang
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect('');  //Home
        }
        else{
            return back()->with('notification', 'ERROR: Email or Password is wrong !');
        }
    }
    public function logout(){
        Auth::logout();
        return back();
    }

    public function register(){
        return view('front.account.register');
    }
    public function postRegister(Request $request)
    {
        // Kiểm tra nếu mật khẩu và mật khẩu xác nhận không khớp
        if ($request->password != $request->password_confirmation) {
            return back()->with('notification', 'ERROR: Confirm password does not match');
        }

        // Tạo dữ liệu người dùng mới
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu trước khi lưu
            'level' => Constant::user_level_client, // đăng ký tài khoản cấp: khách hàng bình thường
        ];

        // Tạo tài khoản người dùng mới
        User::create($data);

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect('account/login')->with('notification', 'Register Success! Please Login.');
    }

    public function myOrderIndex()
    {
        // Lấy các đơn hàng của người dùng hiện tại
        $orders = Orders::where('user_id', Auth::id())->with(['orderDetails.products.productImages'])->get();

        // Trả về view cùng với dữ liệu các đơn hàng
        return view('front.account.my-order.index', compact('orders'));
    }

    public function myOrderShow($id)
    {
        $order = Orders::where('id', $id)
            ->where('user_id', Auth::id())
            ->with(['orderDetails.products.productImages'])
            ->firstOrFail();

        return view('front.account.my-order.show', compact('order'));
    }
}
