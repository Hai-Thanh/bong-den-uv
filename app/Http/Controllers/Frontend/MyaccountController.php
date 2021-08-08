<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyaccountController extends Controller
{
    public function index($id){

        $customers = Customer::find($id);
        $orders = Order::where('customer_id' , $id)->get();
        return view('frontend.my-account.index' ,compact('customers', 'orders'));
    }

    public function changPassfe(Request $request, $id){
        $customers = Customer::find($id);
        $request->validate(
            [
                'password_old' => 'required',
                'password_new' => 'required',
                'password_confim' => 'required|same:password_new',
            ],
            [
                'password_old.required' => 'Để trống sẽ không đăng nhập được',
                'password_new.required' => 'Để trống sẽ không đăng nhập được',
                'password_confim.required' => 'Để trống sẽ không đăng nhập được',
                'password_confim.same' => 'Nhập mật khẩu xác nhận chính xác'
            ]
        );

        $password_confim = Hash::make($request->password_confim);
        $passwordcheck = Hash::check($request->password_old, $customers->password );
        if($passwordcheck){
            $customers->update([
                'password' => $password_confim
            ]);
            return redirect()->route('my.account', ['id'=>$customers->id])->with('status' , "Đổi mật khẩu thành công");
        }
        return redirect()->route('my.account', ['id'=>$customers->id])->with('danger' , "Mật khẩu nhập không chính xác");
    }


   
    public function viewOrderProduct($id){
        $orders = Order::find($id);
        $orders->load('productOrder');
        return view('frontend.my-account.order-view-product', compact('orders'));

    }

}
