<?php

use App\Http\Controllers\Api\AdminApi;
use App\Http\Controllers\Api\CartApi;
use App\Http\Controllers\Api\HomeApi;
use App\Http\Controllers\Api\ProductApi;
use App\Http\Controllers\Api\ReviewApi;
use App\Http\Controllers\Api\UserApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home',[HomeApi::class,'home']);
Route::get('/product/{slug}',[ProductApi::class,'detail']);
Route::post('/review/{slug}',[ReviewApi::class,'makeReview']);
// Cart Api
Route::post('/add-to-cart/{slug}',[CartApi::class,'addToCart']);
Route::get('/product-cart',[CartApi::class,'productCart']);
Route::post('/update-cart',[CartApi::class,'updateCart']);
Route::post('/remove-cart',[CartApi::class,'removeCart']);
Route::post('/checkout',[CartApi::class,'checkout']);
Route::get('/order-list',[CartApi::class,'orderList']);
// User Api
Route::get('/user',[UserApi::class,'detail']);
Route::post('/update',[UserApi::class,'update']);
Route::post('/change-password',[UserApi::class,'changePassword']);

//Admin Api
Route::get('/admin/profile',[AdminApi::class,'profile']);
Route::post('/admin/profile/update',[AdminApi::class,'update']);
Route::post('/admin/profile/change-password',[AdminApi::class,'changePassword']);
