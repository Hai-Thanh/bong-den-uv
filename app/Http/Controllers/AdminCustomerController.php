<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminCustomerController extends Controller
{
    public function __construct(Customer $customer)
    {
        $this->customer  = $customer;
    }
    public function index()
    {
        $customers =   $this->customer->all();
        return view('admin.customers.index', compact('customers'));
    }

    public function add()
    {
        return view('admin.customers.add');
    }

    public function store(Request $request)
    {
        $this->customer->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'avatar' => $request->avatar
        ]);

        return redirect()->route('customers')->with('status', "Thêm khách hàng thành công !");
    }

    public function edit($id)
    {
        $customer =  $this->customer->find($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update($id, Request $request)
    {
        $password = $request->password;
        $customer =   $this->customer->find($id);
        if ($request->avatar  != $customer->avatar) {
            $delete_item = str_replace("http://localhost:8000/storage", '/public', $customer->avatar);
            Storage::delete($delete_item);
        }
        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'avatar' => $request->avatar
        ];
        if (strlen($password) > 0) {
            $dataUpdate['password'] = Hash::make($password);
        }
        $customer->update($dataUpdate);
        return redirect()->route('customers')->with('status', "Cập nhật thành viên thành công !");
    }

    public function delete($id)
    {
        try {
            $customer =   $this->customer->find($id);
            $delete_customer = str_replace("http://localhost:8000/storage", '/public', $customer->avatar);
            Storage::delete($delete_customer);
            $customer->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'Line: ' . $e->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
