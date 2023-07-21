<?php
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//$user = DB::select('select * from users where uid = ?', array(session('uid')));
//$post_id = trim(url()->current())[strlen(url()->current()) - 1];
//$post = DB::select('select * from posts where pid = ?', array(session('pid')));;
//$host = "localhost:8000";
//$profileImgUrl = "http://$host/" . $user['profile_image_path'];
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "blog";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select * from users where uid = :userId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userId',$uid);
$uid = session("uid");
$stmt->execute();
//$stmt->setFetchMode(PDO::FETCH_ASSOC);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$conn = null;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select * from posts where pid = :postId";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':postId',$pid);
$pid= (url()->current())[strlen(url()->current()) - 1];
session()->put('post_id',$pid);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$host = "localhost:8000";
$profileImgUrl = "http://$host/" . $user["profile_image_path"];
?>

@extends('base')

@section('title','Posts !')
@section('body')
    <x-navbar-lgbtn/><br>
    @foreach($posts as $post)
        <div class="container border border-bottom-0 h-75 mb-3">
            <div class="w-50" style="">
                <img src="{{ $profileImgUrl }}" class="rounded-circle object-fit-cover border" style="width:20%;" alt="...">
            </div>
            <h4 style="display:inline-block;">{{$post['title']}}</h4>
            <p>{{$post['content']}}</p>
            <a href="/welcome/posts/{{$pid}}/edit" class="btn btn-primary mt-2">Edit Post</a>
        </div>
    @endforeach
    <x-footer/>
@endsection
