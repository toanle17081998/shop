<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //

    public function index(){
        return view('Admin.Users.login',['title' => 'Đăng nhập hệ thống']);
    }

    
    public function store(LoginRequest $request){
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->filled('remember'))){
            // return redirect()->route('admin.index');
            return redirect()->route('admin.index')->with('success','Đăng nhập thành công !');
        };
        return redirect()->route('login')->with('error','Email hoặc mật khẩu không đúng!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login')->with('success','Bạn đã đăng suất thành công!');
    }
}