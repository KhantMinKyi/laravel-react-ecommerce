<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'mm_name'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $file=$request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);

        Category::create([
            'slug'=>Str::slug($request->name).uniqid(),
            'name'=>$request->name,
            'mm_name'=>$request->mm_name,
            'image'=>$file_name,
        ]);
        return redirect()->back()->with('success','Category Created successfully');
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
        $category = Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with('error','Category Not Found');
        }
        return view('admin.category.edit',compact('category'));
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
        $request->validate([
            'name'=>'required',
            'mm_name'=>'required'
        ]);
        $category = Category::where('slug',$id)->first();
        if(!$category){
            return redirect()->back()->with('error','Category Not Found');
        }
        if($file=$request->file('image')){
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'),$file_name);
            File::delete(public_path('/images/'.$category->image));
        }else{
            $file_name =$category->image;
        }

        Category::where('slug',$id)->update([
            "name"=>$request->name,
            "mm_name"=>$request->mm_name,
            "image"=>$file_name,
        ]);
        return redirect(route('category.index'))->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('slug',$id);
        if(!$category->first()){
            return redirect()->back()->with('error','Category Not Found');
        }
        File::delete(public_path('/images/'.$category->first()->image));
        $category->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
