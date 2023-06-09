<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewApi extends Controller
{
    public function makeReview(Request $request,$slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product){
            return response()->json([
                'message'=>false,
                'data'=>'Product Not Found'
            ]);
        }
        $review = ProductReview::create([
            'user_id'=>$request->user_id,
            'product_id'=>$product->id,
            'review'=>$request->comment,
            'rating'=>$request->rating,
        ]);
        $review = ProductReview::where('id',$review->id)->with('user')->first();
        return response()->json([
            'message'=>true,
            'data'=>$review
        ]);
    }
}
