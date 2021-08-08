<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginCustomrerAdmin extends Controller
{

    public function loginCustomers(){
        $customer_login=  session('customer_login', false);
        if ($customer_login && isset($customer_login["id"]) && ($customer_login["id"] > 0)) {
            return redirect()->route('home');
        }
        return view('login.login-customers');
    }

    public function postLoginCustomers(Request $request){
        $email = $request->input('email', '');
        $password = $request->input('password', '');
        $remember_me = $request->input('remember_me', '');
        $customers = Customer::where('email', '=', $email)->first();
        if(!$customers){
            $request->session()->flash('msg', 'Thông tin đăng nhập không đúng, email không tồn tại');
            return view('login.login-customers');
        }
       if(isset($customers->id) && ($customers->id > 0) && Hash::check($password, $customers->password)){
            $customerLogin = [
                'id'=> $customers->id,
                'email' =>$customers->email,
                'phone_number' =>$customers->phone_number,
                'name' =>$customers->name,
                "password" => $customers->password,
                "avatar" => $customers->avatar,
            ];
            session(['customer_login' =>$customerLogin]);

            // tạo cookie remember me và cập nhật vào trong bản ghi trong csdl 
            if($remember_me == "on"){
                $minutes = 3600*30;
                $hash = $customers->id.$customers->email.$customers->password;
                $cookieValue = Hash::make($hash);
                cookie('customer_login_remember', $cookieValue, $minutes);
                Customer::where('id', $customers->id)->update(['remember_token' =>$cookieValue]);
            }
            return redirect()->route('home');
        }
        $request->session()->flash('msg', 'Thông tin đăng nhập không đúng, email không tồn tại');

        return view('login.login-customers');
    }
    public function logoutCustomer(Request $request){
        cookie('customer_login_remember', "", -3600);
        $request->session()->forget(['customer_login']);
        $request->session()->flush();
        return redirect()->route('login.customers')->with('msg', 'Đăng xuất thàng công !');
    }

    public function register(){
        return view('login.register');
    }

    public function postregister(Request $request){
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'avatar'=> '',
        ]);
        return redirect()->route('login.customers')->with('status', "Đăng kí khách hàng thành công !");
    }
}
