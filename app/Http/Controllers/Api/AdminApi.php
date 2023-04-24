<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminApi extends Controller
{
    public function profile(){
        $admin_id = request()->admin_id;
        $admin = Admin::where('id',$admin_id)->first();
        if(!$admin){
            return response()->json([
                'message'=>false,
                'data'=>"Admin Not Found"
            ]);
        }
        return response()->json([
            'message'=>true,
            'data'=>$admin
        ]);
    }

    public function update(Request $request){
        $admin_id = $request->admin_id;
        $admin = Admin::where('id',$admin_id)->first();
        if(!$admin){
            return response()->json([
                'message'=>false,
                'data'=>"Adminadmin not Found!"
            ]);
        }

        $name = $request->name;
         $image = $request->image;
        $address = $request->address;
        $phone = $request->phone;

        // image Check
        if($admin->image === $image){
            $file_name =$admin->image;
        }else{
            $file=$request->file('image');
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'),$file_name);
            File::delete(public_path('/images/'.$admin->image));

        }

        $admin->update([
            'name'=>$name,
            'image'=>$file_name,
            'address'=>$address,
            'phone'=>$phone
        ]);
        return response()->json([
            'message'=>true,
            'data'=>$admin
        ]);
    }

    public function changePassword(){
        $admin_id = request()->admin_id;
        $current_password = request()->currentPassword;
        $new_password = request()->newPassword;

        $admin = Admin::where('id',$admin_id)->first();
        if(!$admin){
            return response()->json([
                'message'=>false,
                'data'=>"Admin Not Found"
            ]);
        }

        if(Hash::check($current_password,$admin->password)){
            $admin->update([
                'password'=>Hash::make($new_password)
            ]);
            return response()->json([
                'messagHashe'=>true,
                'data'=>null
            ]);
        }else{
            return response()->json([
                'message'=>false,
                'data'=>"Password Doesn't Match"
            ]);
        }
    }
}
