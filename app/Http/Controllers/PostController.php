<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Couchbase\RequestTracer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function checkSessionValidity(Request $request){
        if(!$request->session()->has('uid')){
            //...
            return redirect('/login');
        }
        else{
            return view('addpost',['class'=>'d-none','msg'=>'']);
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
        if($blogPost->save()) {
            return view('addpost', ['class' => 'alert alert-success','msg'=>'Post added successfully !']);
        }
        else{
            return view('addpost',['class'=>'alert alert-danger','msg'=>'Could not add post !']);
        }
    }
    public function showPost(Request $request,$pid){
        if($request->session()->has('uid')){
            $request->session()->put('post_id',$pid);
            $request->session()->save();
            return view('post',['class'=>'d-none','msg'=>'','pid'=> $request->session()->get('post_id'),'host'=>$request->getHttpHost()]);
        }
        else{
            return redirect('/login');
        }

    }
    public function editPost(Request $request){
        if($request->session()->has('uid')){
            $postId = $request->session()->get('post_id');
            return view('editpost',['class'=>'d-none','msg'=>'']);
        }
    }
    public function submitEditedPost(Request $request){
        $title = $request->input('blogName');
        $content = $request->input('content');

        $post = Post::where('pid',session('post_id'))->update(['title'=> $title,'content'=>$content]);
        if($post != 0 && $request->method() == 'POST'){
            return view('editpost',['class'=>'alert alert-success','msg'=>'Post updated successfully !']);

        }
        else if($post == 0 && $request->method() == 'POST'){
            return view('editpost',['class'=>'alert alert-danger','msg'=>'Post is not updated !','host'=>$request->getHttpHost()]);

        }
    }

    public function deletePost(Request $request,$pid){
        if($request->session()->has('uid') && $request->method() == 'POST'){
            //...
            $post = Post::where('pid','=',$pid);
            if($post->delete()){
                return view('post',['class'=>'alert alert-success','msg'=>'Post deleted sucessfully !','host'=>$request->getHttpHost()]);
            }
            else{
                return view('post',['class'=>'alert alert-danger','msg'=>'Could not delete post !',$request->getHttpHost()]);
            }
        }
        elseif(!$request->session()->has('uid')){
            return redirect('/login');
        }
    }

}
