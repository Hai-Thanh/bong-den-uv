<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    use StorageImageTrait;

    public function __construct(Slider $sliderModel)
    {
        $this->slide = $sliderModel;
    }

    public function index()
    {
        $sliders = $this->slide->all();
        return view('admin.slide.index', compact('sliders'));
    }


    public function add()
    {
        return view('admin.slide.add');
    }

    public function store(SliderRequest $request)
    {
        $dataCreate = [
            'name' => $request->name,
            'descripiton' => $request->descripiton,
        ];
        $dataUpdoadImage = $this->storageTraitUpload($request, 'image_path', 'slider');
        if (!empty($dataUpdoadImage)) {
            $dataCreate['image_path'] = $dataUpdoadImage['file_path'];
            $dataCreate['image_name'] = $dataUpdoadImage['file_name'];
        }
        $this->slide->create($dataCreate);
        return redirect()->route('slider')->with('status', 'Thêm slide thành công');
    }



    public function edit($id)
    {
        $slide = $this->slide->find($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function update($id, SliderRequest $request)
    {
        $slide =$this->slide->find($id);
        $dataUpdate = [
            'name' => $request->name,
            'descripiton' => $request->descripiton,
        ];
       if($request->hasFile('image_path')){
            $delete_item = str_replace("/storage" , '/public/' , $slide->image_path);
            Storage::delete($delete_item);
             $dataUpdoadImage = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataUpdoadImage)) {
                $dataUpdate['image_path'] = $dataUpdoadImage['file_path'];
                $dataUpdate['image_name'] = $dataUpdoadImage['file_name'];
            }
       }

        $slide->update($dataUpdate);
        return redirect()->route('slider')->with('status', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        try {

            $slide= $this->slide->find($id);
            $delete_item = str_replace("/storage" , '/public/' , $slide->image_path);
            Storage::delete($delete_item);
            $slide->delete();
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
