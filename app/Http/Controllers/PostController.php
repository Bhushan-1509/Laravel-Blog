<?php

namespace App\Http\Controllers;

use Couchbase\RequestTracer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showPost(Request $request,$pid){
        return view('post');
    }
    public function editPost(Request $request,$post_id){
        return view('editpost');
    }
    public function submitEditedPost(Request $request){

    }

}
