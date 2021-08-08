<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;



class RolesController extends Controller
{
    

    public function __construct(Role $role)
    {
        $this->role = $role;
        $this->middleware('auth');
        
    }

    public function index(){

        $roles  =   $this->role->all();
        return view('admin.spatie.roles.index', compact('roles'));
    }

    public function add(){


        return view('admin.spatie.roles.add');
    }

    public function store(Request $request){
        $this->role->create($request->all());

        return redirect()->route('role')->with('status',"Thêm role thành công");
    }

    public function edit($id){

    $role = $this->role->find($id);

    return view('admin.spatie.roles.edit', compact('role'));

    }


    public function update($id,Request $request){
        $this->role->find($id)->update($request->all());
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
