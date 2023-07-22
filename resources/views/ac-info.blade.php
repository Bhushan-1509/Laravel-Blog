<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

$user = User::where('uid',session('uid'))->first();
$profilePhoto = $user->profile_image_path;

?>

@extends('base')
@section('title','Account Info ')
@section('body')

    <x-navbar-lgbtn/>
    <hr>
    <div class="container mt-2 mb-3">
        <x-forms.alert-box class="{{$class}}" msg="{{$msg}}"/>
    </div>
    <div class="container border-1 h-50 w-50">
        <img src="{{url($profilePhoto)}}" class="rounded-circle object-fit-cover border"  style="width:20%;height:20%;" alt="...">
        <b><h3 class="display-6" style="font-size:2rem;display:inline-block;">{{$user->first_name}} {{$user->last_name}} </h3></b>
        <p style="color:grey;" class="mt-3">{{$user->email}}</p>
        <div class="mx-1 mt-2 h-75 ">
            <form class="mb-4" method="post" action="/ac-info" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <div class="col col-sm-12">
                        <div class="">
                            <b><label for="exampleInputEmail1" class="form-label">First Name</label></b>
                            <x-forms.input-field type="text" value="{{$user->first_name}}" name="firstName"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="">
                            <b><label for="exampleInputPassword1" class="form-label">Last Name</label></b>
                            <x-forms.input-field type="text" value="{{$user->last_name}}" name="lastName"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="">
                            <b><label for="exampleInputPassword1" class="form-label">Email Address </label></b>
                            <input class="form-control" type="text" placeholder="{{$user->email}}" aria-label="Disabled input example" name="email" disabled>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="file">
                    </div>
                </div>

              <div class="container w-50 text-center">
                  <button type="submit" class="btn btn-primary" style="width:30%;">Update</button>
              </div>

            </form>
        </div>
    </div></div>

    </div>

    </div>
@endsection



