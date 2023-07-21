<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $user = new User;
        $email = $request->input("email");
        $getUser = User::where('email',$email)->first();
        if(strcmp($user->password,md5($request->input('password')))){
            session(["uid" => $getUser->uid]);
            return redirect('/welcome');
        }
        else{
          //...
        }

    }
    public function checkSessionValidity(Request $request){
        if($request->session()->get('uid')){
            return redirect('/welcome');
        }
        else{
            return view("/login");
        }
    }

}
