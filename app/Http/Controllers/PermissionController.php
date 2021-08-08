<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
   
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware('auth');
        
    }

    public function index(){

        $permission = $this->permission->all();
        return view('admin.spatie.permission.index',compact('permission'));

    }

    public function add(){

        return view('admin.spatie.permission.add');
    }
    
    public function store(Request $request){

        $this->permission->create($request->all());
    
        return redirect()->route('permission')->with('status', 'Thêm permission thành công');
    }

    public function edit($id){

        $permission = $this->permission->find($id);

        return view('admin.spatie.permission.edit', compact('permission'));
    }

    public function update($id, Request $request){

        $this->permission->find($id)->update($request->all());
        return redirect()->route('permission')->with('status', 'Cập nhật permission thành công');
    }



    public function delete($id){
        try {
           $this->permission->find($id)->delete();
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
