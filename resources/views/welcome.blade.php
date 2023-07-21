<?php
    use App\Models\Post;
    use App\Models\User;

    $posts = Post::where('user_id','=',session('uid'))->get();
    $noOfPosts = $posts->count();
    $user = User::where('uid',session('uid'))->first();
    $profileImgUrl = $user->profile_image_path;
?>

@extends('base')

@section('title','welcome User !')
@section('body')
    <x-navbar-lgbtn/><br>
  @if($noOfPosts)

      @foreach ($posts as $post)
          <div class="container border mb-3">
              <div class="w-50" style="">
                  <img src="{{$profileImgUrl}}" class="rounded-circle object-fit-cover border" style="width:20%;" alt="...">
              </div>
              <a href="/welcome/posts/{{$post->pid}}"><h4 style="display:inline-block;">{{ $post->title }}</h4></a>
              <p>{{ $post->content }}</p>
          </div>
      @endforeach
  @else
      <div class="container">
          <h3 class="display-6 text-center">No Posts here !</h3>
      </div>
      <br>
  @endif
    <div class="container">
        <a href="/addpost" class="btn btn-primary">Add more</a>
    </div>

@endsection
<x-footer/>

