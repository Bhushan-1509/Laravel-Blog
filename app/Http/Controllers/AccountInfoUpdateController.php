<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\PDO;



class AccountInfoUpdateController extends Controller
{
    public function updateInfo(Request $request){
       if($request->session()->has('uid') && $request->method() == 'POST'){
           $firstName = $request->input('firstName');
           $lastName = $request->input('lastName');
           $request->validate([
               'file' => 'required|mimes:jpg,jpeg,png,webp|max:4096'
           ]);
           $file = $request->file('file');
           $fileName = time().$file->getClientOriginalName();
           $filePath = 'uploads/' . $fileName;
           $file->move('uploads/', $fileName);
           $user = User::where('uid',session('uid'));
           $user->update(['first_name' => $firstName]);
           $user->update(['last_name' => $lastName]);
           if($file) {
               $user->update(['profile_image_path' => $filePath]);
           }
           return view('/ac-info',['class'=> 'alert alert-success','msg'=> 'Account info updated successfully!']);
       }
       else{
           return redirect('/login');
       }
    }
    public function showAccountInfo(Request $request){
        if($request->method() == 'GET'){
            return view('ac-info',['class'=>'d-none','msg'=>'']);
        }
    }

}
