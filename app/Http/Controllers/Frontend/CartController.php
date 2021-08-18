<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addCart($id)
    {
        // session()->forget('cart');
        $carts = session()->get('cart');
        $product = Products::find($id);
        if (isset($carts[$id])) {
            $carts[$id]['quantity'] =   $carts[$id]['quantity'] + 1;
        } else {
            $carts[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image_path' => $product->image_path
            ];
        }
        session()->put('cart', $carts);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function cartList()
    {

        $carts = session()->get('cart');
        return view('frontend.carts.carts', compact('carts'));
    }

    public function cartDelete(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponents  = view('frontend.carts.commponents.carts_commponents', compact('carts'))->render();
            return response()->json(['cartComponents' => $cartComponents, 'code' => 200], 200);
        }
    }

    public function cartUpdate(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponents  = view('frontend.carts.commponents.carts_commponents' ,compact('carts'))->render();
            return response()->json(['cartComponents'=>$cartComponents], 200);
        }
    }

    public function addCartDetail(Request $request, $id)
    {
        $carts = session()->get('cart');
        $product = Products::find($id);
        if (isset($carts[$id])) {
            if ($request->id && $request->quantity) {
                $carts = session()->get('cart');
                $carts[$request->id]['quantity'] += $request->quantity;
                session()->put('cart', $carts);
                $carts = session()->get('cart');
            }
        } else {
            $carts[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image_path' => $product->image_path
            ];
        }
        session()->put('cart', $carts);

        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }


    public function checkOut(){

        return view('frontend.carts.checkout');
    }

    public function postcheckOut(Request $request){

        $customer_login = session('customer_login');

        $carts = session()->get('cart');
        $orders = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'order_note' => $request->order_note,
            'total_product' => $request->total_product,
            'total_price' =>  $request->total_price,
            'order_status' => 0,
            'user_id' => 0,
            'customer_id' =>$customer_login['id']
        ]);
        
        foreach($carts as $key => $cart ){
            $orderDetail = OrderDetail::create([
                'product_id' => $key,
                'product_price'=>$cart['price'],
                'quantity' =>$cart['quantity'],
                'order_id' => $orders->id
            ]);
        }
        session()->forget('cart');
        return redirect()->route('bill', ['id' => $orders->id]);
    }

    public function viewBill(){
        $id  = $_GET['id'];
        $orders = Order::find($id);
        if($orders){
            $orderDetail = OrderDetail::where('order_id', $id)->get();
            $list_product_id = [];
            $list_qty = [];
            foreach($orderDetail as $detail){
                $list_product_id[]  = $detail->product_id;
                $list_qty[] = $detail->quantity;
            }
    
            $products = Products::find($list_product_id);
        }else{
            return redirect()->route('checkout');
        }
        return   view('frontend.carts.bill' ,compact('orders' , 'products' , 'list_qty'));

    }


}
