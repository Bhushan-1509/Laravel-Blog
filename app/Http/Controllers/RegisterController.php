<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class RegisterController extends Controller
{
    public function submitData(Request $request){
        $firstName = $request->input("firstName");
        $lastName = $request->input("lastName");
        $email = $request->input("email");
        $password = $request->input("password");


        $user = new User;
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->password = md5($password);
//        $user->created_at = date("Y-m-d H:i:s");
        if($user->save()){
            return redirect("/welcome");
        }
        //otherwise show alert on same page
    }
}
