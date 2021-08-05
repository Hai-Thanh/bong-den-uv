<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminOrderController extends Controller
{

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function index()
    {
        $orders = $this->order->all();

        $orders->load('productOrder');

        return view('admin.orders.index', compact('orders'));
    }

    public function add()
    {
        return view('admin.orders.add');
    }

    public function searchProduct(Request $request)
    {
        $searchKeyword = $request->input("search", "");
        $queryORM = Products::where('name', "LIKE", "%" . $searchKeyword . "%");
        $products = $queryORM->paginate(10);
        $msg["results"] = [];
        if ($products) {
            foreach ($products as $product) {
                $msg["results"][] = ["id" => $product->id, "text" => $product->id . " - " . $product->name];
            }
        }
        return response()->json($msg, 200);
    }

    public function ajaxSingleProduct(Request $request)
    {
        $id = (int) $request->input("id", "");
        $product = Products::findOrFail($id);
        $productShort = [
            "id" => $product->id,
            "name" => $product->name,
            "image_path" => $product->image_path,
            "quantity" => $product->quantity,
            "price" => $product->price,
        ];
        return response()->json($productShort, 200);
    }

    public function store(OrderRequest $request)
    {
        $totalPrice = 0;
        $qty = 0;
        if (!empty($product_ids) || !empty($quantity)) {
            return redirect()->route('orders.add')->withInput()->withErrors(["product_ids" => "chưa chọn sản phẩm cho đơn hàng"]);
        }

        $datacreateOrder = [
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'order_note' => $request->order_note,
            'order_status' => $request->order_status,
            'user_id' => Auth::id(),
        ];
        $product_ids = $request->product_ids;
        $product_quantity = $request->quantity;

        foreach ($product_ids as $product_ids_key => $productId) {
            $quantity = $product_quantity[$product_ids_key];
            $product = Products::find($productId);
            $totalPriceProduct = $quantity * $product->price;
            $totalPrice += $totalPriceProduct;
            $qty += $quantity;
        }
        $datacreateOrder['total_product'] = $quantity;
        $datacreateOrder['total_price'] = $totalPrice;
        $order = Order::create($datacreateOrder);


        foreach ($product_ids as $product_ids_key => $productId) {
            $quantity = $product_quantity[$product_ids_key];
            $product = Products::find($productId);
            $totalPriceProduct = $quantity * $product->price;
            $orderDetail = OrderDetail::create([
                'product_id' => $productId,
                'product_price' => $product->price,
                'quantity' => $quantity,
                'order_id' => $order->id
            ]);
        }
        return redirect()->route('orders')->with("status", "Thêm đơn hàng thành công");
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $productInOrders = DB::table('products')
            ->join('order_detail', 'order_detail.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.image_path', 'order_detail.order_id', 'order_detail.quantity', 'order_detail.product_price')
            ->where('order_detail.order_id', '=', $id)
            ->get();
        return view('admin.orders.edit', compact('order', 'productInOrders'));
    }

    public function update($id, OrderRequest $request)
    {
        $this->order->find($id)->update([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'order_note' => $request->order_note,
            'order_status' => $request->order_status,
        ]);
        return redirect()->route('orders')->with("status", "Cập nhật đơn hàng thành công");
    }

    public function delete($id)
    {
        try {
            $this->order->find($id)->delete();
            OrderDetail::where('order_id', $id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (Exception  $e) {
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
