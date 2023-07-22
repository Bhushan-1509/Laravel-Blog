<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class RegisterController extends Controller
{
    public function show(Request $request){
        return view('register',['class'=>'d-none','msg'=>'']);
    }
    public function submitData(Request $request){
        $firstName = $request->input("firstName");
        $lastName = $request->input("lastName");
        $email = $request->input("email");
        $password = $request->input("password");



        $isExists = User::where('email','=',$email)->get()->count();
        if($isExists){
            return view("register",['class'=>'alert alert-danger','msg'=>'Account already exists !']);
        }
        else{
            $user = new User;
            $user->first_name = $firstName;
            $user->last_name = $lastName;
            $user->email = $email;
            $user->password = md5($password);
            $user->save();
            return view("register",['class'=>'alert alert-success','msg'=>'Account created sucessfully !']);
        }
        //otherwise show alert on same page
    }
}
