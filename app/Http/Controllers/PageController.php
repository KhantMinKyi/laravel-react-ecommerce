<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function profile(){
        return view('user.profile');
    }

    public function about(){
        return view ('about');
    }
    public function contact(){
        return view ('contact');
    }


    public function products(){
        $categories = Category::withCount('product')->get();
        $colors = Color::all();
        $brands = Brand::all();
        $products = Product::latest();

        if($category_slug = request()->category){
            $findCategory = Category::where('slug',$category_slug)->first();
            if(!$findCategory){
                return redirect('/products')->with("errro","Category Not Found");
            }
            $products->where('category_id',$findCategory->id);
        }

        if($brand_slug = request()->brand){
            $findBrand = Brand::where('slug',$brand_slug)->first();
            if(!$findBrand){
                return redirect('/products')->with("errro","Brand Not Found");
            }
            $products->where('brand_id',$findBrand->id);
        }
        if($color_slug = request()->color){
            $findColor = Color::where('slug',$color_slug)->first();
            if(!$findColor){
                return redirect('/products')->with("errro","Color Not Found");
            }
            $products->whereHas('color',function($q) use($findColor){
                $q->where('product_color.color_id',$findColor->id);
            });
        }
        if($search = request()->search){
            $products->where('name','like',"%$search%");
        }
        $products = $products->paginate(6);
        return view('products',compact('categories','colors','brands','products'));
    }
}
