<?php

namespace App\Http\Controllers;

use App\Components\RecusiveCategory;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminCategoriesController extends Controller
{
   
    protected $categories ;
    public function __construct(Categories $categoriesModel)
    {
        $this->categories = $categoriesModel;
    }

    public function index(){
        $categories = $this->categories->latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    } 
    public function add(){

        $htmlOption = $this->getCategory($parent_id ='');
        return view('admin.categories.add' , compact('htmlOption'));
    }

    public function store(CategoriesRequest $request){
        
        $this->categories->create([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name),
            'parent_id'=> $request->parent_id,
            'image_path' =>$request->image_path
        ]);
        return redirect('/admin/categories/')->with('status','Thêm sản phẩm thành công');
    }

    public function getCategory($parent_id){
        $data = $this->categories->all();

        $recusive = new RecusiveCategory($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
        
    }
    public function edit($id){

        $category =   $this->categories->find($id);
        $htmlOption= $this->getCategory($category->parent_id);
        return view('admin.categories.edit' ,compact('htmlOption', 'category'));
    }

    public function update(CategoriesRequest $request , $id){   
        $categories =  $this->categories->find($id);
        if($request->image_path  != $categories->image_path){
            $delete_item = str_replace("http://localhost:8000/storage" , '/public' , $categories->image_path);
            Storage::delete($delete_item);
        }
      
        $categories->update([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name),
            'parent_id'=> $request->parent_id,
            'image_path' =>$request->image_path
        ]);
        return redirect('/admin/categories/')->with('status','Cập nhật sản phẩm thành công');
    }

    public function delete($id){

        try{

            $categories = $this->categories->find($id);
            $delete_item = str_replace("http://localhost:8000/storage" , '/public' , $categories->image_path);
            Storage::delete($delete_item);

            $categories->delete();
            return response()->json([
                'code'=> 200,
                'message' => 'success',
            ],200);

        }catch(Exception  $e ){
            DB::rollBack();
            Log::error("message" . $e->getMessage(). 'Line: '.$e->getLine());
            return response()->json([
                'code'=> 500,
                'message' => 'fail',
            ],500);
        }
    }
    
    public function detail($id){
        $category = $this->categories->find($id);
        $category->load('products');
        return view('admin.categories.detail', compact('category'));
    }
}