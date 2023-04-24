<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('user.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->with('error','Email Not Found');
        }
        if(!Hash::check($request->password,$user->password)){
            return redirect()->back()->with('error','Password is Wrong , Try Again');
        }
        auth()->login($user);
        return redirect('/')->with('success','Welcome To Our Website '.$user->name);
    }

    public function showRegister(){
        return view('user.register');
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
        $findUser = User::where('email',$request->email)->first();
        if($findUser){
            return redirect()->back()->with('error','Email Already Exist');
        }
        $file=$request->file('image');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'nrc'=>$request->nrc,
            'address'=>$request->address,
            'image'=>$file_name,
            'password'=>Hash::make($request->password),
        ]);
        auth()->login($user);
        return redirect('/')->with('success','Welcome To Our Website '.$user->name);
    }
    public function logout(){
        auth()->logout();
        return redirect()->back()->with('success','You Have Been Logout');
    }
}
