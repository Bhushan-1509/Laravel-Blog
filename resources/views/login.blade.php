@extends('base')
@section('title','Laravel-blog - Login')
@section('body')
    <x-navbar/>
    <div class="container text-center w-50 mt-2">
        <x-forms.alert-box class="{{$class}}" msg="{{$msg}}"/>
    </div>
    <div class="container w-50 border mt-3 rounded">
        <div class="container text-center">
            <h2 class="display-6 mt-2">Login !</h2>
        </div>

        <div class="mx-1 mt-5 h-75">
            <form class="mb-4" method="post" action="/login">
                @csrf
                <div class="row mb-4">
                    <div class="col col-sm-12">
                        <div class="">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <x-forms.text-input type="email" name="email" />
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                    </div>
                </div>
              <div class="row mb-3">
                <div class="col">
                    <div class="">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <x-forms.text-input type="password" name="password" />
                    </div>
                </div>
              </div>
             <div class="row mb-4" >
               <div class="col">
                   <div class="form-check">
                       <input type="checkbox" class="form-check-input" id="exampleCheck1">
                       <label class="form-check-label" for="exampleCheck1">Check me out</label>
                   </div>
               </div>
             </div>

                <button type="submit" class="btn btn-primary w-100" style="width:30%;">Login</button>

            </form>
            <div class="container">
                <p><a class="link-opacity-25-hover" href="/register">Don't have account ?</a></p
            </div>
        </div>
    </div></div>
    <x-footer/>
@endsection
{{--@section('footer')--}}
{{--    <x-footer/>--}}
{{--@endsection--}}
