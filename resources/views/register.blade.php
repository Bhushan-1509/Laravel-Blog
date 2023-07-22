@extends('base')

@section('title','Laravel-blog - Register !')
@section('body')

    <x-navbar/>
    <div class="container text-center mt-2">
        <x-forms.alert-box class="{{$class}}" msg="{{$msg}}"/>
    </div>
    <div class="container w-50 border mt-3 h-50 rounded">
        <div class="container text-center">
            <h2 class="display-6 mt-1">Register !</h2>
        </div>

        <div class="mx-1 mt-4">
            <form class="mb-6" method="post" action="/register">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="firstName">
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lastName">
                </div>
                <div class="mb-4">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>


                <button type="submit" class="btn btn-primary mb-4">Register</button>

            </form>
        </div>
    </div>
        <x-footer/>
@endsection

{{--@section('footer')--}}
{{--    <x-footer/>--}}
{{--@endsection--}}
