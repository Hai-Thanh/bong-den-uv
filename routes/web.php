<?php


use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\MyaccountController;
use App\Http\Controllers\Frontend\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginCustomrerAdmin;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/config/prepare-role-n-permission', function(){
    // Role::create([ 'name' => 'admin']);
    // Role::create(  [ 'name' => 'editor']);
    // Role::create(  [ 'name' => 'moderator']);

    // Permission::create(  ['name' => 'add product']  );
    // Permission::create( ['name' => 'remove product'] );
    // Permission::create( ['name' => 'edit product'] );
    // Permission::create( ['name' => 'view product'] );
   
    $adminRole =  Role::find(1);
    $editorRole =  Role::find(2);
    $modRole =  Role::find(3);

    $addProPer = Permission::find(1);
    $removeProPer = Permission::find(2);

    $adminRole->givePermissionTo($addProPer);
    $adminRole->givePermissionTo($removeProPer);

    $editorRole->givePermissionTo($addProPer);
    $modRole->givePermissionTo($removeProPer);

    $adminAcc = User::find(7);
    $adminAcc ->assignRole('admin');

    $modAcc = User::find(10);
    $modAcc ->assignRole('moderator');
    return "done";

});




// giao diện đổ sản phẩm
Route::get('/', [FrontendHomeController::class,'index'])->name('home'); 
Route::get('/shop',[FrontendHomeController::class, 'shop'])->name('shop');
Route::get('/shop/product-detail/{id}', [FrontendHomeController::class, 'productDetail'])->name('products.detail');
Route::get('/shop/product-categories/{id}', [FrontendHomeController::class, 'productCategories'])->name('products.categories');
Route::get('/shop/product-tag/{id}', [FrontendHomeController::class, 'productTag'])->name('products.tag');
// giao diện đổ sản phẩm

// Phần search sản phẩm bên ngoài frontend
Route::post('/search-product', [FrontendHomeController::class, 'shop'])->name('search');

// Phần thông tin tài khoản bên ngoài front end 
Route::get('/my-account/{id}', [MyaccountController::class, 'index'])->name('my.account')->middleware('customersauth');
Route::post('/my-account/change-pasword/{id}', [MyaccountController::class, 'changPassfe'])->name('changepassword'); 
Route::get('/order-detail-product/{id}', [MyaccountController::class, 'viewOrderProduct'])->name('order.detail.product'); 


// đặt hàng
Route::get('/add-to-cart/{id}',[CartController::class, 'addCart'] )->name('add-to-cart');
Route::get('/add-to-cart-detail/{id}',[CartController::class, 'addCartDetail'] )->name('add-to-cart-detail');
Route::get('/cart', [CartController::class, 'cartList'])->name('carts');
Route::get('/cart-delete', [CartController::class, 'cartDelete'])->name('delete.cart');
Route::get('/cart-update', [CartController::class, 'cartUpdate'])->name('update.cart');
Route::get('/checkout', [CartController::class, 'checkOut'])->name('checkout')->middleware('customersauth');
Route::post('/checkout-post', [CartController::class, 'postcheckOut'])->name('postcheckout')->middleware('customersauth');
Route::get('/checkout/bill', [CartController::class, 'viewBill'])->name('bill')->middleware('customersauth');

/// đặt hàng
Route::get('/posts/detail/{id}', [PostsController::class, 'detailPost'])->name('posts.detail');
Route::get('/posts', [PostsController::class, 'postList'])->name('posts.list');
Route::get('/aboutus', [PostsController::class, 'aboutus'])->name('aboutus');
Route::get('/contact', [PostsController::class, 'contact'])->name('contact');


// LOGIN CUSTOMERS
Route::get('/login-customers', [LoginCustomrerAdmin::class, 'loginCustomers'])->name('login.customers');
Route::post('/post-login-customers', [LoginCustomrerAdmin::class, 'postLoginCustomers'])->name('postlogin.customers');
Route::get('/logout-customers', [LoginCustomrerAdmin::class, 'logoutCustomer'])->name('logout.customers');
Route::get('/register', [LoginCustomrerAdmin::class, 'register'])->name('register');
Route::post('/register', [LoginCustomrerAdmin::class, 'postregister'])->name('postregister');
// LOGIN CUSTOMERS

// LOGIN CỦA ADMIN
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/login', [HomeController::class, 'postLogin'])->name('postlogin');

// LOGIN CỦA ADMIN


Route::get('fake-login/{id}', function($id){  // đăng nhập bằng id kh cần mật khẩu
    $user =User::find($id);
    Auth::login($user);
    return redirect()->route('services');
});
Route::any('/logout', function(){
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin' )->middleware('auth')->group(function(){

    Route::get('/', [HomeController::class  , 'index'])->name('dashboard');
    Route::prefix('categories')->group(function(){
        Route::get('/', [AdminCategoriesController::class, 'index'])->name('categories');
        Route::get('/add', [AdminCategoriesController::class, 'add'])->name('add_cate');
        Route::post('/store', [AdminCategoriesController::class, 'store'])->name('store_cate');
        Route::get('/edit/{id}', [AdminCategoriesController::class, 'edit']);
        Route::post('/update/{id}', [AdminCategoriesController::class, 'update']);
        Route::get('/delete/{id}', [AdminCategoriesController::class, 'delete']);
        Route::get('/detail/{id}', [AdminCategoriesController::class, 'detail'])->name('category.detail'); 
    });

    Route::prefix('products')->group(function(){
        Route::get('/', [AdminProductController::class, 'index'])->name('products');
        Route::get('/add', [AdminProductController::class, 'add'])->middleware('permission:add product')->name('add');
        Route::post('/store', [AdminProductController::class, 'store'])->middleware('permission:add product')->name('store');
        Route::get('/edit/{id}',[AdminProductController::class, 'edit']);
        Route::post('/update/{id}',[AdminProductController::class, 'update']);
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('delete')->middleware('permission:remove product');
    });

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/add', [UserController::class, 'add'])->name('users.add');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete.user');
        Route::get('/change-password/{id}', [UserController::class, 'changePassword'])->name('user.change.password');
        Route::post('/change-post/{id}', [UserController::class, 'changePasswordPost'])->name('password.post');

    });

   
    Route::prefix('slider')->group(function(){
        Route::get('/', [AdminSliderController::class, 'index'])->name('slider');
        Route::get('/add', [AdminSliderController::class, 'add'])->name('slider.add');
        Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete');
    });

    Route::prefix('setting')->group(function(){
        Route::get('/', [AdminSettingController::class, 'index'])->name('setting');
        Route::get('/add', [AdminSettingController::class, 'add'])->name('setting.add');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('setting.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('setting.edit');
        Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('setting.update');
        Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])->name('setting.delete');
    });

    Route::prefix('orders')->group(function(){
        Route::get('/', [AdminOrderController::class, 'index'])->name('orders');
        Route::get('/add', [AdminOrderController::class, 'add'])->name('orders.add');
        Route::post('/store', [AdminOrderController::class, 'store'])->name('orders.store');
        Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('orders.edit');
        Route::post('/update/{id}', [AdminOrderController::class, 'update'])->name('orders.update');
        Route::get('/delete/{id}', [AdminOrderController::class, 'delete'])->name('orders.delete');
        Route::post('/searchProduct', [AdminOrderController::class, "searchProduct"])->name('searchProduct');
        Route::post('/ajaxSingleProduct', [AdminOrderController::class, "ajaxSingleProduct"])->name('ajaxSingleProduct');
    });

    Route::prefix('customers')->group(function(){
        Route::get('/', [AdminCustomerController::class, 'index'])->name('customers');
        Route::get('/add', [AdminCustomerController::class, 'add'])->name('customers.add');
        Route::post('/store', [AdminCustomerController::class, 'store'])->name('customers.store');
        Route::get('/edit/{id}', [AdminCustomerController::class, 'edit'])->name('customers.edit');
        Route::post('/update/{id}', [AdminCustomerController::class, 'update'])->name('customers.update');
        Route::get('/delete/{id}', [AdminCustomerController::class, 'delete'])->name('customers.delete');
    });

    Route::prefix('posts')->group(function(){
        Route::get('/', [AdminPostController::class, 'index'])->name('posts');
        Route::get('/add', [AdminPostController::class, 'add'])->name('posts.add');
        Route::post('/store', [AdminPostController::class, 'store'])->name('posts.store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('posts.edit');
        Route::post('/update/{id}', [AdminPostController::class, 'update'])->name('posts.update');
        Route::get('/delete/{id}', [AdminPostController::class, 'delete'])->name('posts.delete');
    });

    // Phân quyền saptie

    Route::prefix('permission')->group(function(){
        Route::get('/', [PermissionController::class, 'index'])->name('permission');
        Route::get('/add', [PermissionController::class, 'add'])->name('permission.add');
        Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');
    });


    Route::prefix('role')->group(function(){
        Route::get('/', [RolesController::class, 'index'])->name('role');
        Route::get('/add', [RolesController::class, 'add'])->name('role.add');
        Route::post('/store', [RolesController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RolesController::class, 'update'])->name('role.update');
        Route::get('/delete/{id}', [RolesController::class, 'delete'])->name('role.delete');
    });

    





});
