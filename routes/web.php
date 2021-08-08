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
        Route::get('/', [AdminCategoriesController::class, 'index'])->middleware('permission:view categories')->name('categories');
        Route::get('/add', [AdminCategoriesController::class, 'add'])->middleware('permission:add categories')->name('add_cate');
        Route::post('/store', [AdminCategoriesController::class, 'store'])->middleware('permission:add categories')->name('store_cate');
        Route::get('/edit/{id}', [AdminCategoriesController::class, 'edit'])->middleware('permission:edit categories');
        Route::post('/update/{id}', [AdminCategoriesController::class, 'update'])->middleware('permission:edit categories');
        Route::get('/delete/{id}', [AdminCategoriesController::class, 'delete'])->middleware('permission:delete categories');
        Route::get('/detail/{id}', [AdminCategoriesController::class, 'detail'])->name('category.detail'); 
    });

    Route::prefix('products')->group(function(){
        Route::get('/', [AdminProductController::class, 'index'])->name('products');
        Route::get('/add', [AdminProductController::class, 'add'])->middleware('permission:add product')->name('add');
        Route::post('/store', [AdminProductController::class, 'store'])->middleware('permission:add product')->name('store');
        Route::get('/edit/{id}',[AdminProductController::class, 'edit'])->middleware('permission:edit product');
        Route::post('/update/{id}',[AdminProductController::class, 'update'])->middleware('permission:edit product');
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->name('delete')->middleware('permission:remove product');
    });

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->middleware('permission:view user')->name('users');
        Route::get('/add', [UserController::class, 'add'])->middleware('permission:add user')->name('users.add');
        Route::post('/store', [UserController::class, 'store'])->middleware('permission:add user')->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware('permission:edit user')->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->middleware('permission:edit user')->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->middleware('permission:delete user')->name('delete.user');
        Route::get('/change-password/{id}', [UserController::class, 'changePassword'])->name('user.change.password');
        Route::post('/change-post/{id}', [UserController::class, 'changePasswordPost'])->name('password.post');

    });

   
    Route::prefix('slider')->group(function(){
        Route::get('/', [AdminSliderController::class, 'index'])->middleware('permission:view slider')->name('slider');
        Route::get('/add', [AdminSliderController::class, 'add'])->middleware('permission:add slider')->name('slider.add');
        Route::post('/store', [AdminSliderController::class, 'store'])->middleware('permission:add slider')->name('slider.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->middleware('permission:edit slider')->name('slider.edit');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->middleware('permission:edit slider')->name('slider.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->middleware('permission:delete slider')->name('slider.delete');
    });

    Route::prefix('setting')->group(function(){
        Route::get('/', [AdminSettingController::class, 'index'])->middleware('permission:view settings')->name('setting');
        Route::get('/add', [AdminSettingController::class, 'add'])->middleware('permission:add settings')->name('setting.add');
        Route::post('/store', [AdminSettingController::class, 'store'])->middleware('permission:add settings')->name('setting.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->middleware('permission:edit settings')->name('setting.edit');
        Route::post('/update/{id}', [AdminSettingController::class, 'update'])->middleware('permission:edit settings')->name('setting.update');
        Route::get('/delete/{id}', [AdminSettingController::class, 'delete'])->middleware('permission:delete settings')->name('setting.delete');
    });

    Route::prefix('orders')->group(function(){
        Route::get('/', [AdminOrderController::class, 'index'])->middleware('permission:view order')->name('orders');
        Route::get('/add', [AdminOrderController::class, 'add'])->middleware('permission:add order')->name('orders.add');
        Route::post('/store', [AdminOrderController::class, 'store'])->middleware('permission:add order')->name('orders.store');
        Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->middleware('permission:edit order')->name('orders.edit');
        Route::post('/update/{id}', [AdminOrderController::class, 'update'])->middleware('permission:delete order')->name('orders.update');
        Route::get('/delete/{id}', [AdminOrderController::class, 'delete'])->name('orders.delete');
        Route::post('/searchProduct', [AdminOrderController::class, "searchProduct"])->name('searchProduct');
        Route::post('/ajaxSingleProduct', [AdminOrderController::class, "ajaxSingleProduct"])->name('ajaxSingleProduct');
    });

    Route::prefix('customers')->group(function(){
        Route::get('/', [AdminCustomerController::class, 'index'])->middleware('permission:view customer')->name('customers');
        Route::get('/add', [AdminCustomerController::class, 'add'])->middleware('permission:add customer')->name('customers.add');
        Route::post('/store', [AdminCustomerController::class, 'store'])->middleware('permission:add customer')->name('customers.store');
        Route::get('/edit/{id}', [AdminCustomerController::class, 'edit'])->middleware('permission:edit customer')->name('customers.edit');
        Route::post('/update/{id}', [AdminCustomerController::class, 'update'])->middleware('permission:edit customer')->name('customers.update');
        Route::get('/delete/{id}', [AdminCustomerController::class, 'delete'])->middleware('permission:delete customer')->name('customers.delete');
    });

    Route::prefix('posts')->group(function(){
        Route::get('/', [AdminPostController::class, 'index'])->middleware('permission:view post')->name('posts');
        Route::get('/add', [AdminPostController::class, 'add'])->middleware('permission:add post')->name('posts.add');
        Route::post('/store', [AdminPostController::class, 'store'])->middleware('permission:add post')->name('posts.store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->middleware('permission:edit post')->name('posts.edit');
        Route::post('/update/{id}', [AdminPostController::class, 'update'])->middleware('permission:edit post')->name('posts.update');
        Route::get('/delete/{id}', [AdminPostController::class, 'delete'])->middleware('permission:delete post')->name('posts.delete');
    });

    // Phân quyền saptie

    Route::prefix('permission')->group(function(){
        Route::get('/', [PermissionController::class, 'index'])->middleware('permission:view permissions')->name('permission');
        Route::get('/add', [PermissionController::class, 'add'])->middleware('permission:add permissions')->name('permission.add');
        Route::post('/store', [PermissionController::class, 'store'])->middleware('permission:add permissions')->name('permission.store');
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->middleware('permission:edit permissions')->name('permission.edit');
        Route::post('/update/{id}', [PermissionController::class, 'update'])->middleware('permission:edit permissions')->name('permission.update');
        Route::get('/delete/{id}', [PermissionController::class, 'delete'])->middleware('permission:delete permissions')->name('permission.delete');
    });

    Route::prefix('role')->group(function(){
        Route::get('/', [RolesController::class, 'index'])->middleware('permission:view role')->name('role');
        Route::get('/add', [RolesController::class, 'add'])->middleware('permission:add role')->name('role.add');
        Route::post('/store', [RolesController::class, 'store'])->middleware('permission:add role')->name('role.store');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->middleware('permission:edit role')->name('role.edit');
        Route::post('/update/{id}', [RolesController::class, 'update'])->middleware('permission:edit role')->name('role.update');
        Route::get('/delete/{id}', [RolesController::class, 'delete'])->middleware('permission:delete role')->name('role.delete');
    });
});
