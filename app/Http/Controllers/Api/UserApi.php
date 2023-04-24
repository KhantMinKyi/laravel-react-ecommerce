<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserApi extends Controller
{
    public function detail(){
        $user_id = request()->user_id;
        $user = User::where('id',$user_id)->first();
        if(!$user){
            return response()->json([
                'message'=>false,
                'data'=>"User Not Found"
            ]);
        }
        return response()->json([
            'message'=>true,
            'data'=>$user
        ]);
    }
    public function changePassword(){
        $user_id = request()->user_id;
        $current_password = request()->currentPassword;
        $new_password = request()->newPassword;

        $user = User::where('id',$user_id)->first();
        if(!$user){
            return response()->json([
                'message'=>false,
                'data'=>"User Not Found"
            ]);
        }

        if(Hash::check($current_password,$user->password)){
            $user->update([
                'password'=>Hash::make($new_password)
            ]);
            return response()->json([
                'message'=>true,
                'data'=>null
            ]);
        }else{
            return response()->json([
                'message'=>false,
                'data'=>"Password Doesn't Match"
            ]);
        }
    }
    public function update(Request $request){
        $user_id = $request->user_id;
        $user = User::where('id',$user_id)->first();
        if(!$user){
            return response()->json([
                'message'=>false,
                'data'=>"User not Found!"
            ]);
        }

        $name = $request->name;
         $image = $request->image;
        $address = $request->address;
        $phone = $request->phone;

        // image Check
        if($user->image === $image){
            $file_name =$user->image;
        }else{
            $file=$request->file('image');
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images'),$file_name);
            File::delete(public_path('/images/'.$user->image));

        }

        $user->update([
            'name'=>$name,
            'image'=>$file_name,
            'address'=>$address,
            'phone'=>$phone
        ]);
        return response()->json([
            'message'=>true,
            'data'=>$user
        ]);
    }
}
