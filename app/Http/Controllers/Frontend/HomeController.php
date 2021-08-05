<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\TagProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct(Slider $slider , Categories $categories, Products $products , Tag $tag)
    {
        $this->slider = $slider;
        $this->categories = $categories;
        $this->products = $products;
        $this->tag = $tag;
        
    }
    public function index(){
       
        $sliders = $this->slider->take(3)->get();
        $categories= $this->categories->orderBy('id' ,'desc')->take(4)->get();
        $productsnew = $this->products->orderBy('id' ,'asc')->take(12)->get();
        $productbestsellers = $this->products->orderBy('id', 'desc')->take(8)->get();
        return view('frontend.home.home',compact('sliders','categories','productbestsellers','productsnew'));
    }

    public function shop(Request $request){
            $pageSize = 12;
            $searchKeyword = $request->query('search_products', '');
            $queryORM = $this->products->take(100);
            if($searchKeyword){
                $queryORM = $this->products->where('name',  "LIKE", '%' . $searchKeyword . '%');  
            }
            $products = $queryORM->paginate($pageSize);
        
        return view('frontend.products.shop',compact('products'));
    }

    public function productDetail($id){

       
        $products =   $this->products->find($id);
        $products->load('category' , 'imageMutiple');
        $productRelated = $this->products->where('category_id', '=' , $products->category_id)->get();


        return view('frontend.products.product-detail' ,compact('products', 'productRelated'));
    }

    public function productCategories($id){
        $products = $this->products->where('category_id' , $id)->paginate(12);
        $catename = $this->categories->find($id);
        return view('frontend.products.product-categories',compact('products' ,'catename'));
    }


    public function productTag($id){

        $tag = $this->tag->find($id);


        // $products = $this->products->where('category_id' , $id)->paginate(12);


        return view('frontend.products.product-tag' , compact('tag'));
    }

  

}
