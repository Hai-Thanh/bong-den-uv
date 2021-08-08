<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
    public function __construct(Role $role , Permission $permission)
    {
        $this->role = $role;
        $this->permission= $permission;
        $this->middleware('auth');
    }

    public function index(){

        $roles  =   $this->role->all();
        return view('admin.spatie.roles.index', compact('roles'));
    }

    public function add(){

        $permission = $this->permission->all();
        return view('admin.spatie.roles.add' , compact('permission'));

    }

    public function store(Request $request){

        $role = $this->role->create([
            'name' => $request->name
        ]);
        if($request->has('permission')){
            $role->givePermissionTo($request->permission);
        }
        return redirect()->route('role')->with('status',"Thêm role thành công");
    }

    public function edit($id){
        $permission = $this->permission->all();
        $role = $this->role->find($id);
        return view('admin.spatie.roles.edit', compact('role', 'permission'));
    }


    public function update($id,Request $request){
        $role = $this->role->find($id);
        $role->update($request->all());
        if($request->has('permission')){
            $role->syncPermissions($request->permission);
        }

        return redirect()->route('role')->with('status',"Thêm role thành công");
    }

    public function delete($id){
        try {
           $this->role->find($id)->delete();
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
