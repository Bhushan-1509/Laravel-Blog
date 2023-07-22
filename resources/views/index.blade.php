<?php
use App\Models\Post;
use App\Models\User;

$posts = Post::all();
$noOfPosts = $posts->count();
?>

@extends('base')

@section('title','Welcome !')
@section('body')
    @if(session()->has('uid'))
        <x-navbar-lgbtn/><br>
    @else
        <x-navbar/><br>
    @endif
    @if($noOfPosts)

        @foreach ($posts as $post)
            <div class="container border mb-3">
                <div class="w-50" style="">
                    <img src="{{User::where('uid',$post->user_id)->first()->profile_image_path}}" class="rounded-circle object-fit-cover border" style="width:20%;" alt="...">
                </div>
                <span href="/welcome/posts/{{$post->pid}}"><h4 style="display:inline-block;">{{ $post->title }}</h4></span>
                <p>{{ $post->content }}</p>
            </div>
        @endforeach
    @else
        <div class="container">
            <h3 class="display-6 text-center">No Posts here !</h3>
        </div>
        <br>
    @endif

    <x-footer/>
@endsection


