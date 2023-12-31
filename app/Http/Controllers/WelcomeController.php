<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function checkSessionValidity(Request $request){
        if(!$request->session()->has('uid')){
            //...
            return redirect('/login');
        }
        else{
            return view('welcome');
        }
    }
}
