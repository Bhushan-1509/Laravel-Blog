<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\URL;

$user = User::where('uid','=',session('uid'))->first();
$post = Post::where('pid','=',session('post_id'))->first();
//Session::forget('post_id');


?>
@extends('base')

@section('title','Edit Post')
@section('body')
    <x-navbar-lgbtn/>
    <div class="container mt-2">
        <x-forms.alert-box class="{{$class}}" msg="{{$msg}}"/>
    </div>
        <div class="container border rounded mt-4 h-100">
            <form class="h-50" method="post" action="{{url()->current()}}">
                @csrf
                <div class="mb-5">
                    <label for="exampleInputEmail1" class="form-label">Blog Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name = 'blogName' value="{{$post->title}}" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Name should strictly be associated with the type of content that you're writting.</div>
                </div>
                <div class="form-floating mb-5">
                    <textarea class="form-control h-100" placeholder="Leave a comment here" name='content' id="floatingTextarea2" rows="10">{{$post->content}}</textarea>
                    <label for="floatingTextarea2">Your content</label>
                </div>
              <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
@endsection
<x-footer/>

