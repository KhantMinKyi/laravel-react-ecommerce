<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Mockery\Expectation;

class HomeApi extends Controller
{
    public function home(){
        $category = Category::withCount('product')->get();
        $brands= Brand::all();
        try{
            $products= Product::latest()->with('category','brand')->paginate(20);
        }catch(Expectation $e){
            $products = [];
        }
        $randomProduct = Product::inRandomOrder()->limit(8)->with('category')->get();
        $discountProduct = Product::inRandomOrder()->limit(2)->with('category')->get();

        $productByCategories = Category::has('product')->take(2)->get();

        foreach($productByCategories as $key=>$productByCategory){
            $productByCategories[$key]->product = Product::where('category_id',$productByCategory->id)->take(9)->get();
        }
        return response()->json([
            'success'=>true,
            'data'=>[
                'category'=>$category,
                'brands'=>$brands,
                'products'=>$products,
                'randomProduct'=>$randomProduct,
                'discountProduct'=>$discountProduct,
                'productByCategories'=>$productByCategories,
            ],
        ]);
    }
}
