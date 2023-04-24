<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartApi extends Controller
{
    // Detail Page add To Cart button click
    public function addToCart(Request $request,$slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product){
            return response()->json([
                'message'=>false,
                'data'=>"Product Not Found"
            ]);
        }
        $findCart = ProductCart::where('user_id',$request->user_id)->where('product_id',$product->id)->first();
        if($findCart){
            $total_quantity = $findCart->total_quantity + 1;
            $findCart->update([
                'total_quantity' => $total_quantity
            ]);
        }else{
            ProductCart::create([
                'product_id'=>$product->id,
                'user_id'=>$request->user_id,
                'color'=>$request->color,
                'total_quantity'=>1,
            ]);
        }
        $cartCount =ProductCart::where('user_id',$request->user_id)->count();
        return response()->json([
            'message'=>true,
            'data'=>$cartCount
        ]);
    }
// Show Product Cart
    public function productCart(){
        $user_id = request()->user_id;
        $cart = ProductCart::where('user_id',$user_id)->with('product')->get();
        if(!$cart){
            return response()->json([
                'message'=>false,
                'data'=>'No Cart Created'
            ]);
        }
        return response()->json([
            'message'=>true,
            'data'=>$cart
        ]);
    }
    // Update Cart Save Quantity
    public function updateCart(){
        $cart_id = request()->card_id;
        $total_quantity = request()->total_quantity;

        ProductCart::where('id',$cart_id)->update([
            'total_quantity'=>$total_quantity
        ]);
        return response()->json([
            'message'=>true,
            'data'=>null
        ]);
    }
// delete Cart
    public function removeCart(){
        $cart_id = request()->card_id;
        ProductCart::where('id',$cart_id)->delete();
        $cartCount =ProductCart::where('user_id',request()->user_id)->count();
        return response()->json([
            'message'=>true,
            'data'=>$cartCount
        ]);
    }
    // check out Cart
    public function checkout(){
        $user_id = request()->user_id;
        $carts = ProductCart::where('user_id',$user_id)->get();
        if(!$carts){
            return response()->json([
                'message'=>false,
                'data'=>'Cart Not Found'
            ]);
        }
        foreach($carts as $cart){
            ProductOrder::create([
                'user_id'=>$user_id,
                'product_id'=>$cart->product_id,
                'color'=>$cart->color,
                'total_quantity'=>$cart->total_quantity
            ]);
        }
        ProductCart::where('user_id',$user_id)->delete();
        return response()->json([
            'message'=>true,
            'data'=>null
        ]);
    }
    // view Order List

    public function orderList(){
        $user_id=request()->user_id;
        if($filterDate = request()->date){
            $order = ProductOrder::whereDate('created_at', '=', date($filterDate))->with('product')->paginate(10);
            return response()->json([
                'message'=>true,
                'data'=>$order
            ]);
        }else{
            $order = ProductOrder::where('user_id',$user_id)->with('product')->orderBy('created_at','ASC')->paginate(10);
            if(!$order){
                return response()->json([
                'message'=>false,
                'data'=>null
            ]);
        }
        return response()->json([
            'message'=>true,
            'data'=>$order
        ]);
    }

    }
}
