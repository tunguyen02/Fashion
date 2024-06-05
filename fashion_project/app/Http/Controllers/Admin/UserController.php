<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utilities\Common;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        // Lấy giá trị tìm kiếm từ request
        $search = $request->get('search');

        // Tìm kiếm người dùng theo tên hoặc email và phân trang
        $users = User::where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->paginate(10); // Số lượng mục trên mỗi trang

        // Truyền dữ liệu tới view
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra mật khẩu xác nhận
        if ($request->get('password') != $request->get('password_confirmation')) {
            return back()->with('notification', 'ERROR: Confirm password does not match');
        }

        // Lấy tất cả dữ liệu từ request
        $data = $request->all();

        // Mã hóa mật khẩu
        $data['password'] = bcrypt($request->get('password'));

        //Xu ly file
        if($request->hasFile('image')){
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');
        }

        // Tạo người dùng mới
        $user = User::create($data);

        // Chuyển hướng đến trang chi tiết người dùng vừa tạo
        return redirect('admin/user/' . $user->id );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        //Xu ly mat khau
        if($request->get('password') != null) {
            if ($request->get('password') != $request->get('password_confirmation')) {
                return back()->with('notification', 'ERROR: Confirm password does not match');
            }
            $data['password'] = bcrypt($request->get('password'));
        }
        else{
           unset($data['password']);
        }

        //Xu ly file anh
        if($request->hasFile('image')){
            //Them file moi
            $data['avatar'] = Common::uploadFile($request->file('image'), 'front/img/user');
            //Xoa file cu
//            $file_name_old = $request->get('image_old');
//            if($file_name_old != '') {
//                unlink('front/img/user' . $file_name_old);
//            }
        }

        //Cap nhat du lieu
        $user->update($data);

        return redirect('admin/user/' . $user->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        $file_name = $user->avatar;
        if($file_name != '') {
            unlink('front/img/user' . $file_name);
        }

        return redirect('admin/user');

    }
}
