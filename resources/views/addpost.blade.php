@extends('base')

@section('title','Add post !')
@section('body')
    <x-navbar-lgbtn/>
    <div class="container mt-2">
        <x-forms.alert-box class="{{$class}}" msg="{{$msg}}"/>
    </div>
    <div class="container border rounded mt-4 h-100">
     <form class="h-50" method="post" action="/addpost">
         @csrf
      <div class="mb-5">
        <label for="exampleInputEmail1" class="form-label">Blog Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name = 'blogName' aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Name should strictly be associated with the type of content that you're writting.</div>
      </div>
     <div class="mb-5">
         <label for="exampleInputEmail1" class="form-label">Content</label>
         <textarea class="form-control" placeholder="Leave a comment here" name='content' id="floatingTextarea2" rows="10"></textarea>
     </div>
     <button type="submit" class="btn btn-primary mb-2" style="">Publish</button>
    </form>
    </div>
@endsection


