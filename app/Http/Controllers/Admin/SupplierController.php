<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::latest()->paginate(5);
        return view('admin.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'description'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

        $file=$request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);

        Supplier::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>$file_name,
        ]);
        return redirect()->back()->with('success','Supplier Created successfully');
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
        $supplier = Supplier::where('id',$id)->first();
        if(!$supplier){
            return redirect()->back()->with('error','Supplier Not Found');
        }
        return view('admin.supplier.edit',compact('supplier'));
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
            'description'=>'required'
        ]);
        $supplier = Supplier::where('id',$id)->first();
        if(!$supplier){
            return redirect()->back()->with('error','Supplier Not Found');
        }
        if($file=$request->file('image')){
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'),$file_name);
            File::delete(public_path('/images/'.$supplier->image));
        }else{
            $file_name =$supplier->image;
        }

        Supplier::where('id',$id)->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "image"=>$file_name,
        ]);
        return redirect(route('supplier.index'))->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('id',$id);
        if(!$supplier->first()){
            return redirect()->back()->with('error','Supplier Not Found');
        }
        File::delete(public_path('/images/'.$supplier->first()->image));
        $supplier->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }
}
