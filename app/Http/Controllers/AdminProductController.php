<?php

namespace App\Http\Controllers;

use App\Components\RecusiveCategory;
use App\Http\Requests\ProductsRequest;
use App\Models\Categories;
use App\Models\ProductImage;
use App\Models\Products;
use App\Models\Tag;
use App\Models\TagProduct;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $category;
    private $productImage;
    private $tagProduct;
    private $tag;


    public function __construct(Products $productModel, Categories $categoriesModel, ProductImage $productImageModel, TagProduct $tagProductModel, Tag $tagModel)
    {
        $this->product = $productModel;
        $this->category = $categoriesModel;
        $this->productImage = $productImageModel;
        $this->tagProduct = $tagProductModel;
        $this->tag  = $tagModel;
    }

    public function index(Request $request)
    {

        $sort = $request->query('product_sort', '');
        $searchKeyword = $request->query('product_name', '');
        $productPrice = $request->query('product_price', '');
        $category_id = (int)$request->query('category_id', 0);

        $queryORM = $this->product->take(1000);
        if ($searchKeyword) {
            $queryORM = $this->product->where('name',  "LIKE", '%' . $searchKeyword . '%');
        }
        if ($productPrice) {
            $queryORM = $this->product->where('price',  "LIKE", '%' . $productPrice . '%');
        }
        if ($category_id) {
            $queryORM = $this->product->where('category_id', $category_id);
        }
        if ($sort == "price_asc") {
            $queryORM->orderBy('price', 'asc');
        }
        if ($sort == 'price_desc') {
            $queryORM->orderBy('price', 'desc');
        }
        if ($sort == 'quantity_asc') {
            $queryORM->orderBy('quantity', 'asc');
        }
        if ($sort == 'quantity_desc') {
            $queryORM->orderBy('quantity', 'desc');
        }
        if ($sort == '1') {
            $queryORM->where('status', '1');
        }
        if ($sort == '0') {
            $queryORM->where('status', '0');
        }
        $pageSize = 20;
        $products = $queryORM->paginate($pageSize)->appends($request->except('page'));

        $products->load('category');

        $data = [];
        $data['products'] = $products;
        $data['searchKeyword'] = $searchKeyword;
        $data['sort'] = $sort;
        $data['productPrice'] = $productPrice;
        $data['category_id'] = $category_id;
        $data['categories'] = $this->category->all();
        return view('admin.products.index', $data);
    }
    public function add()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.products.add', compact('htmlOption'));
    }

    public function store(ProductsRequest $request)
    {

        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status,
                'content' => $request->content,
                'image_path' => $request->image_path
            ];

            $product =  $this->product->create($dataProductCreate);
            // insert nhiều ảnh
            if ($request->hasFile('image_path_gallery')) {
                foreach ($request->image_path_gallery as $fileItem) {
                    $galleries = $this->storageTraitUploadMutiple($fileItem, 'products/galleries/' . $product->id);
                    $file_path = $galleries['file_path'];
                    $file_name = $galleries['file_name'];

                    $product->imageMutiple()->create([
                        'image_path' => $file_path,
                        'image_name' => $file_name
                    ]);
                }
            }
            //insert tags 
            foreach ($request->tags as $tagItem) {
                $tagInstance =  $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagId[] = $tagInstance->id;
            }
            $product->tagsMutiple()->attach($tagId);    
            DB::commit();
            return redirect('admin/products/')->with('status', 'Thêm sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("message " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.products.edit', compact('htmlOption', 'product'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new RecusiveCategory($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }

    public function update(ProductsRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = $this->product->find($id);
            
            // if ($request->image_path  != $product->image_path) {
            //     $delete_item = str_replace("http://localhost:8000/storage", '/public', $product->image_path);
            //     Storage::delete($delete_item);
            // }

            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => $request->status,
                'content' => $request->content,
                'image_path' => $request->image_path
            ]);

            $product = $this->product->find($id);

            if ($request->input('removeGalleryIds') != "") {
                $strIds = rtrim($request->removeGalleryIds, '|');
                $lstIds = explode('|', $strIds);
                $removeList = ProductImage::whereIn('id', $lstIds)->get();

                foreach ($removeList as $gl) {
                    $delete_item = str_replace("/storage", '/public/', $gl->image_path);
                    Storage::delete($delete_item);
                }
                ProductImage::destroy($lstIds);
            }

            if ($request->hasFile('image_path_gallery')) {
                foreach ($request->image_path_gallery as $fileItem) {
                    $galleries = $this->storageTraitUploadMutiple($fileItem, 'products/galleries/' . $product->id);
                    $file_path = $galleries['file_path'];
                    $file_name = $galleries['file_name'];
                    $product->imageMutiple()->create([
                        'image_path' => $file_path,
                        'image_name' => $file_name
                    ]);
                }
            }

            $tagId = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance =  $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagId[] = $tagInstance->id;
                }
            }
            $product->tagsMutiple()->sync($tagId);
            DB::commit();
            return redirect('admin/products/')->with('status', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("message " . $e->getMessage() . 'Line:' . $e->getLine());
        }
    }
    public function delete($id)
    {
        try {
            $galleries = ProductImage::where('product_id', $id)->get();
            foreach ($galleries as $gallerie) {
                $delete_item_gallerie = str_replace("/storage", '/public/', $gallerie->image_path);
                Storage::delete($delete_item_gallerie);
                $gallerie->delete();
            }

            $product =    $this->product->find($id);
            $delete_item = str_replace("http://localhost:8000/storage", '/public', $product->image_path);
            Storage::delete($delete_item);

            $product->delete();
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
