<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

$user = User::where('uid','=',session('uid'))->first();
//echo session('post_id')
$posts = Post::where('pid','=',session('post_id'))->get();
Session::forget('post_id');
$host = "localhost:8000";
$profileImgUrl = "http://$host/" . ($user->profile_image_path);

?>
@extends('base')

@section('title','Edit Post')
@section('body')
    <x-navbar-lgbtn/>
    <?php echo $posts; ?>
    @foreach($posts as $post)
        <div class="container border rounded mt-4 h-75  ">
            <form class="h-50" method="post" action="">
                @csrf
                <div class="mb-5">
                    <label for="exampleInputEmail1" class="form-label">Blog Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name = 'blogName' value="{{$post->title}}" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Name should strictly be associated with the type of content that you're writting.</div>
                </div>
                <div class="form-floating mb-4">
                    <textarea class="form-control h-75" placeholder="Leave a comment here" name='content' id="floatingTextarea2" value="{{$post->content}}"></textarea>
                    <label for="floatingTextarea2">Your content</label>
                </div>
                <button type="submit" class="btn btn-primary" style="position:absolute;width:10%;">Edit</button>
            </form>
        </div>
    @endforeach
@endsection
<x-footer/>

