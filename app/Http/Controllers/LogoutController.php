<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logoutUser(Request $request){
        //...
        $request->session()->forget('uid');
        return redirect('/login');
    }
}
