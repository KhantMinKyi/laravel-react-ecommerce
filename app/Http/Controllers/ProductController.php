<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug){
        $product = Product::where('slug',$slug)->with('category','brand','color')->first();
        if(!$product){
            return redirect('/')->with('error','Product not Found');
        }
        return view('product-detail',compact('slug','product'));
    }
}
