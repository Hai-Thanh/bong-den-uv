<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
  
    public function __construct(Setting $settingModel)
    {
        $this->setting = $settingModel;
    }


    public function index(){

        $settings=   $this->setting->all();


        return view('admin.settings.index' , compact('settings'));
    }

    public function add(){
        return view('admin.settings.add');
    }

    public function store(Request $request){
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value'=>$request->config_value
        ]);
        return redirect()->route('setting')->with('status', 'Thêm setting thành công');
    }

    public function edit($id){

 

        $setting =$this->setting->find($id);
        return view('admin.settings.edit',compact('setting') );
    }

    public function update($id, Request $request){

        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value'=>$request->config_value
        ]);

        return redirect()->route('setting')->with('status' , 'Cập nhật setting thành công !');
    }

    public function delete($id){
        try {
            $this->setting->find($id)->delete();
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
