<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\ProductController as ControllersProductController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
Route::get('/user',function(){
    $user = User::find(1);
    auth()->login($user);
});
Route::get('/userout',function(){
    auth()->logout();
});

// All User Access
Route::get('/',[ControllersPageController::class,'index']);
Route::get('/product/{slug}',[ControllersProductController::class,'detail']);
Route::get('/product-detail',[ControllersPageController::class,'productDetail']);
Route::get('/products',[ControllersPageController::class,'products']);
Route::get('/about',[ControllersPageController::class,'about']);
Route::get('/contact',[ControllersPageController::class,'contact']);

//User Auth
Route::group(['middleware'=>['RedirectIfAuth']],function(){
Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'showRegister']);
Route::post('/register',[AuthController::class,'register']);
});
Route::group(['middleware'=>['RedirectIfNotAuth']],function(){
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/profile',[ControllersPageController::class,'profile']);
});


//Admin Routes
Route::get('admin/login',[PageController::class,'showLogin']);
Route::post('admin/login',[PageController::class,'login']);
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['Admin']], function(){
    Route::get('/',[PageController::class,'showDashboard']);
    Route::post('/logout',[PageController::class,'logout']);
    //account
    Route::get('/profile',[PageController::class,'admin']);
    Route::get('/create',[AdminController::class,'create']);
    Route::post('/register',[AdminController::class,'register']);

    //resources
    Route::resource('/category','CategoryController');
    Route::resource('/color','ColorController');
    Route::resource('/brand','BrandController');
    Route::resource('/income','IncomeController');
    Route::resource('/outcome','OutcomeController');
    Route::resource('/supplier','SupplierController');
    //product
    Route::resource('/product','ProductController');
    Route::post('product-upload',[ProductController::class,'productUpload']);
    Route::get('/create-product-add/{slug}',[ProductController::class,'createProductAdd'])->name('admin.create-product-add');
    Route::post('/create-product-add/{slug}',[ProductController::class,'storeProductAdd'])->name('admin.create-product-add');
    Route::get('/create-product-remove/{slug}',[ProductController::class,'createProductRemove'])->name('admin.create-product-remove');
    Route::post('/create-product-remove/{slug}',[ProductController::class,'storeProductRemove'])->name('admin.create-product-remove');

    //Transaction
    Route::get('/product-transaction',[ProductController::class,'viewProductTransaction'])->name('admin.view.product.transaction');
    Route::get('/product-add-transaction',[ProductController::class,'viewAddProductTransaction'])->name('admin.view.add-product.transaction');
    Route::get('/product-add-transaction',[ProductController::class,'viewAddProductTransaction'])->name('admin.view.add-product.transaction');
    Route::get('/product-remove-transaction',[ProductController::class,'viewRemoveProductTransaction'])->name('admin.view.remove-product.transaction');

    //order
    Route::get('/order',[OrderController::class,'orderList'])->name('order.list');
    Route::get('/order/{id}',[OrderController::class,'orderDetail'])->name('order.detail');
    Route::get('/order-update',[OrderController::class,'orderUpdate'])->name('order.update');
});

Route::get('/locale/{locale}',function($locale){
    session()->put('locale',$locale);
    return redirect()->back()->with('success','Language Changed');
});
