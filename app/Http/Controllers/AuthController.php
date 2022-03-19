<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\khoi;
use App\Models\theloai;
use App\Models\nhande;
use App\Models\lop;
use App\Models\hocsinh;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $mess = [
            'email.required'=> 'Điền email',
            'email.email'=>'Điền đúng email đi',
            'password.required'=> 'Bắt buộc nhập mật khẩu',
            'password.min'=> 'Mật khẩu tối thiểu 6 kí tự'
        ];
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'email'=> 'required|email',
                'password'=> 'required|min:6'
            ], $mess)->validate();
            $email = $request->email;
            $password = $request->password;
            if($request->rememberMe == 'yes'){
                if(Auth::attempt(['email' => $email, 'password' => $password], $remember= true)){
                    return redirect('hoc-sinh/profile');
                }
            }
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect('hoc-sinh/profile');
            }
            
        }
        return redirect()->back();
    }
    public function show()
    {
        return view('login', ['lops'=>lop::all()]);
    }
    public function adminlogin()
    {
        return view('admin-login');
    }
    public function postadmin(Request $request)
    {
        $mess = [
            'email.required'=> 'Điền tên đăng nhập',
            'password.required'=> 'Bắt buộc nhập mật khẩu',
            'password.min'=> 'Mật khẩu tối thiểu 6 kí tự'
        ];
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'email'=> 'required',
                'password'=> 'required|min:6'
            ], $mess)->validate();
            $email = $request->email;
            $password = $request->password;
            if($request->rememberMe == 'yes'){
                if(Auth::guard('admin')->attempt(['name' => $email, 'password' => $password], $remember= true)){
                    return redirect('giao-vien/lops');
                }
            }
            if(Auth::guard('admin')->attempt(['name' => $email, 'password' => $password])){
                return redirect('giao-vien/lops');
            }
            
        }
        return redirect()->back();
    }
    public function create(Request $request)
    {
        $mess = [
            'ten.required' => 'Điền tên vào',
            'email.required' => 'Thiếu email',
            'email.email' => 'Điền đúng email',
            'sodienthoai.required' => 'Điền số điện thoại',
            'password.required'=> 'Tạo mật khẩu đăng nhập',
            'password.min'=> 'Mật khẩu tối thiểu 6 kí tự'
        ];
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'ten'=> 'required',
                'email'=> 'required|email',
                'sodienthoai'=> 'required|min:9',
                'namsinh'=> 'required',
                'truong'=> 'required',
                'password'=> 'required|min:6'
            ], $mess)->validate();
            
            $check = hocsinh::all()->where('email', $request->email)->count();
            if($check == 0){
                hocsinh::insert([
                    'ten' => $request->ten,
                    'namsinh' => $request->namsinh,
                    'truong' => $request->truong,
                    'email' => $request->email,
                    'sodienthoai' => $request->sodienthoai,
                    'lop' => $request->lop,
                    'password'=> bcrypt($request->password),
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ]);
            }
        }
        return redirect(route('login'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('hocsinh-login');
    }

    public function messages()
    {
        return [
            'ten.required' => 'Điền tên vào',
            'email.required' => 'Thiếu email',
            'email.email' => 'Điền đúng email',
            'sodienthoai' => 'Điền số điện thoại'
        ];
    }
}
