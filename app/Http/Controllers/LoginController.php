<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $user = new User;
        $email = $request->input("email");
        $password = $request->input('password');
        $getUser = $user::where('email',$email)->first();
        $noOfUsers = $user::where('email',$email)->get()->count();
        if($noOfUsers == 0){
            return view('login',['class'=>'alert alert-danger','msg'=>'No such account exists !']);
        }
        else if($noOfUsers != 0 && (md5(trim($password)) != $getUser->password)){
            return view('login',['class'=>'alert alert-danger','msg'=>'Wrong password']);
        }
        else if($noOfUsers != 0 && (md5(trim($password)) == $getUser->password)){
//            session(["uid" => $getUser->uid]);
            $request->session()->put('uid',$getUser->uid);
            $request->session()->save();
            return redirect('/welcome');
        }


    }
    public function checkSessionValidity(Request $request){
        if($request->session()->get('uid')){
            return redirect('/welcome');
        }
        else{
            return view("/login",['class'=>'d-none','msg'=>'']);
        }
    }

}
