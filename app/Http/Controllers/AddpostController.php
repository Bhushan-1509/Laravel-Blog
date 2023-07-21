<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class AddpostController extends Controller
{
    public function checkSessionValidity(Request $request){
        if(!$request->session()->get('uid')){
            //...
            return redirect('/login');
        }
        else{
            return view('addpost');
        }
    }

    public function addPost(Request $request){
        // ....
        $uid = $request->session()->get('uid');
        $blogName = $request->input('blogName');
        $content = $request->input('content');

        $blogPost = new Post;
        $blogPost->title = $blogName;
        $blogPost->content = $content;
        $blogPost->user_id = $uid;
        $blogPost->save();
        return redirect('/welcome');
    }
}
