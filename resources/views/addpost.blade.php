@extends('base')

@section('title','welcome page !')
@section('body')
    <x-navbar-lgbtn/>
    <div class="container border rounded mt-4 h-75  ">
     <form class="h-50" method="post" action="/addpost">
         @csrf
      <div class="mb-5">
        <label for="exampleInputEmail1" class="form-label">Blog Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name = 'blogName' aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Name should strictly be associated with the type of content that you're writting.</div>
      </div>
     <div class="form-floating mb-4">
         <textarea class="form-control h-75" placeholder="Leave a comment here" name='content' id="floatingTextarea2" ></textarea>
         <label for="floatingTextarea2">Your content</label>
     </div>
      <button type="submit" class="btn btn-primary" style="position:absolute;width:10%;">Post</button>
    </form>
    </div>

@endsection
<x-footer/>

