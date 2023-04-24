<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApi extends Controller
{
    public function detail($slug){
        $category =Category::withCount('product')->take(5)->get();
        $brands =Brand::withCount('product')->take(5)->get();
        $relatedProducts =Product::latest()->with('review.user','category','brand','color')->take(4)->get();
        $product = Product::where('slug',$slug)
        ->with('review.user','category','brand','color')->first();
        if(!$product){
            return response()->json([
                'message'=>false,
                'data'=>'Product Not Found '
            ]);
        }
        return response()->json([
            'success'=>true,
            'data'=>[
                'category'=>$category,
                'relatedProducts'=>$relatedProducts,
                'brands'=>$brands,
                'product'=>$product,
            ]
        ]);
    }
}
