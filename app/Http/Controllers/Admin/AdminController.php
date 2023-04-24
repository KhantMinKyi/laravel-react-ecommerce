<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function create(){
        return view('admin.account.create');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:7',
            'nrc'=>'required',
            'address'=>'required',
            'password'=>'required|min:8',
            'image'=>'required|mimes:png,jpg,jpeg.webp|max:2048'
        ]);
        $findAdmin = Admin::where('email',$request->email)->first();
        if($findAdmin){
            return redirect()->back()->with('error','Email Already Exist');
        }
        $file=$request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);

        $admin = Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'nrc'=>$request->nrc,
            'address'=>$request->address,
            'image'=>$file_name,
            'password'=>Hash::make($request->password),
        ]);
        return redirect('/admin')->with('success',$admin->name. ' is Created ');
    }
}
