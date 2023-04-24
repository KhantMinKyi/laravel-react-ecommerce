<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAddTransaction;
use App\Models\ProductRemoveTransaction;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        return view('admin.product.create',compact('suppliers','categories','brands','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        //validate
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'total_quantity'=>'required|integer',
            'buy_price'=>'required|integer',
            'sale_price'=>'required|integer',
            'discount_price'=>'required|integer',
            'supplier_id'=>'required|integer',
            'category_slug'=>'required|string',
            'brand_slug'=>'required|string',
            'color_slug.*'=>'required|string',
            'image'=>'required|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        //upload image
        $image=$request->file('image');
        $image_name=uniqid().$image->getClientOriginalName();
        $image->move(public_path('/images'),$image_name);

        //Checking Data Avilable
         $supplier = Supplier::where('id',$request->supplier_id)->first();
         if(!$supplier){
            return redirect()->back()->with('error','Supplier Not Found');
         }
         $category = Category::where('slug',$request->category_slug)->first();
         if(!$category){
            return redirect()->back()->with('error','Category Not Found');
         }
         $brand = Brand::where('slug',$request->brand_slug)->first();
         if(!$brand){
            return redirect()->back()->with('error','Brand Not Found');
         }
         $colors=[];
         foreach($request->color_slug as $c){
            $color= Color::where('slug',$c)->first();
            if(!$color){
                return redirect()->back()->with('error','Color Not Found');
             }
             $colors[]=$color->id;
         }

         //product Store
         $product = Product::create([
            'category_id'=>$category->id,
            'supplier_id'=>$supplier->id,
            'brand_id'=>$brand->id,
            'slug'=>uniqid() . Str::slug($request->name),
            'name'=>$request->name,
            'image'=>$image_name,
            'buy_price'=>$request->buy_price,
            'discount_price'=>$request->discount_price,
            'sale_price'=>$request->sale_price,
            'total_quantity'=>$request->total_quantity,
            'view_count'=>0,
            'like_count'=>0,
            'description'=>$request->description
         ]);
        //add to Transaction
         ProductAddTransaction::create([
            'product_id'=>$product->id,
            'supplier_id'=>$supplier->id,
            'total_quantity'=>$request->total_quantity
         ]);
        //add to product color
        $p = Product::find($product->id);
        $p->color()->sync($colors);

        return redirect()->back()->with('success','Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        $product = Product::where('slug',$id)
        ->with('supplier','category','brand','color')
        ->first();
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');
        }
        return view('admin.product.edit',compact('suppliers','categories','brands','colors','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //find Product
        $find_product =Product::where('slug',$id);
        if(!$find_product->first()){
            return redirect()->back()->with('error','Product Not Found');
        }
        $product_id = $find_product->first()->id;

        //check image
        if($file=$request->file('image')){
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'),$file_name);
            File::delete(public_path('/images/'.$find_product->first()->image));
        }else{
            $file_name =$find_product->first()->image;
        }

        //update product
        $supplier = Supplier::where('id',$request->supplier_id)->first();
        if(!$supplier){
           return redirect()->back()->with('error','Supplier Not Found');
        }
        $category = Category::where('slug',$request->category_slug)->first();
        if(!$category){
           return redirect()->back()->with('error','Category Not Found');
        }
        $brand = Brand::where('slug',$request->brand_slug)->first();
        if(!$brand){
           return redirect()->back()->with('error','Brand Not Found');
        }
        $colors=[];
        foreach($request->color_slug as $c){
           $color= Color::where('slug',$c)->first();
           if(!$color){
               return redirect()->back()->with('error','Color Not Found');
            }
            $colors[]=$color->id;
        }

        //product Store
        $slug = uniqid() . Str::slug($request->name);
        $find_product->update([
           'category_id'=>$category->id,
           'supplier_id'=>$supplier->id,
           'brand_id'=>$brand->id,
           'slug'=>$slug,
           'name'=>$request->name,
           'image'=>$file_name,
           'buy_price'=>$request->buy_price,
           'discount_price'=>$request->discount_price,
           'sale_price'=>$request->sale_price,
           'total_quantity'=>$request->total_quantity,
           'view_count'=>0,
           'like_count'=>0,
           'description'=>$request->description
        ]);
        // sync colors
        $product = Product::find($product_id);
        $product->color()->sync($colors);

        return redirect(route('product.edit',$slug))->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find product
        $product= Product::where('slug',$id)->first();
        if(!$product){
            return redirect()->back()->with('error','Product not Found');
        }
        //remove image
        File::delete(public_path('images/'.$product->image));
        //remove product_color
        Product::find($product->id)->color()->sync([]);
        //delete
        $product->delete();
        return redirect()->back()->with('success',"Product Deleted");

    }

    public function productUpload(){
        $file =request()->file('image');
        $file_name=uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);
        return asset('/images/'.$file_name);
    }

    //Product Add Transaction
    public function createProductAdd($slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');
        }
        $suppliers = Supplier::all();
        return view('admin.product.create-product-add',compact('product','suppliers'));
    }

    public function storeProductAdd(Request $request,$slug){
        $request->validate([
            'supplier_id'=>'required',
            'total_quantity'=>'required|integer',
            'description'=>'required',
        ]);
        $products = Product::latest()->paginate(5);
        $product = Product::where('slug',$slug)->first();
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');
        }

        //add transaction
        ProductAddTransaction::create([
            'product_id'=>$product->id,
            'supplier_id'=>$request->supplier_id,
            'total_quantity'=>$request->total_quantity,
            'description'=>$request->description,
        ]);

        //update product total
        $product->update([
            'total_quantity'=>DB::raw('total_quantity +'.$request->total_quantity)
        ]);
        return redirect(route('product.index',$products))->with('success',$request->total_quantity .' '. $product->name .' Added');
    }

    //Product remove Transaction
    public function createProductRemove($slug){
        $product = Product::where('slug',$slug)->first();
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');
        }
        $suppliers = Supplier::all();
        return view('admin.product.create-product-remove',compact('product','suppliers'));
    }
    public function storeProductRemove(Request $request,$slug){
        $request->validate([
            'supplier_id'=>'required',
            'total_quantity'=>'required|integer',
            'description'=>'required',
        ]);
        $products = Product::latest()->paginate(5);
        $product = Product::where('slug',$slug)->first();
        if(!$product){
            return redirect()->back()->with('error','Product Not Found');
        }

        //add transaction
        ProductRemoveTransaction::create([
            'product_id'=>$product->id,
            'supplier_id'=>$request->supplier_id,
            'total_quantity'=>$request->total_quantity,
            'description'=>$request->description,
        ]);

        //update product total
        $product->update([
            'total_quantity'=>DB::raw('total_quantity -'.$request->total_quantity)
        ]);
        return redirect(route('product.index',$products))->with('success',$request->total_quantity .' '. $product->name .' Removed');
    }

    //view Transactions
    public function viewProductTransaction(){
        $addTransactions =ProductAddTransaction::with('product')->paginate(20);
        $removeTransactions =ProductRemoveTransaction::with('product')->paginate(20);
        return view('admin.product.transactions.index',compact('addTransactions','removeTransactions'));
    }
    public function viewAddProductTransaction(){
        $addTransactions =ProductAddTransaction::with('product')->orderBy('created_at','ASC')->paginate(20);
        return view('admin.product.transactions.add-tansaction',compact('addTransactions'));
    }
    public function viewRemoveProductTransaction(){
        $removeTransactions =ProductRemoveTransaction::with('product')->orderBy('created_at','ASC')->paginate(20);
        return view('admin.product.transactions.remove-transaction',compact('removeTransactions'));
    }
}
