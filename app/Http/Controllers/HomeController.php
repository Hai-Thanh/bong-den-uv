<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Categories;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Products;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
     

    public function index(){
        $categories= Categories::all();
        $products = Products::all();
        $users = User::all();
        $slider= Slider::all();
        $orders = Order::all();
        $customers = Customer::all();

        return view('admin.dashboard' , compact('categories', 'customers', 'orders','products', 'users', 'slider'));
        
    }

    public function login(){

        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('login.login');
    }
   
    public function postLogin(Request $request){
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Hãy nhập tài khoản',
                'password.required' => 'Để trống sẽ không đăng nhập được'
            ]
        );
        $remember = $request->has('remember_me') ? true:false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember) || Auth::attempt(['phone_number' => $request->email, 'password' => $request->password] , $remember) ) {
            // attempt trả ra là true/false
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('msg', "Sai tài khoản hoặc mật khẩu");
        }
        
        if(!Auth::check()){
            return redirect()->route('login')->with('msg', "Vui lòng hay đăng nhập !");
        }
        return redirect()->back()->with('msg', 'Sai thông tin đăng nhâp');
    }




}
