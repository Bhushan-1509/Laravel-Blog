<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login',[\App\Http\Controllers\LoginController::class,'checkSessionValidity']);

Route::post('/login',[\App\Http\Controllers\LoginController::class,'authenticate']);


Route::get('/register',[\App\Http\Controllers\RegisterController::class,'show']);

Route::post('/register',[\App\Http\Controllers\RegisterController::class,'submitData']);

Route::get("/welcome",[\App\Http\Controllers\WelcomeController::class,'checkSessionValidity']);

Route::get("/welcome/posts/{pid}",[\App\Http\Controllers\PostController::class,'showPost']);

Route::get("/welcome/posts/{pid}/edit",[\App\Http\Controllers\PostController::class,'editPost']);

Route::post("/welcome/posts/{pid}/edit",[\App\Http\Controllers\PostController::class,'submitEditedPost']);

Route::get("/addpost",[\App\Http\Controllers\PostController::class,'checkSessionValidity']);

Route::post("/addpost",[\App\Http\Controllers\PostController::class,'addPost']);

Route::post('/deletepost/{pid}',[\App\Http\Controllers\PostController::class,'deletePost']);

Route::get("/logout", [\App\Http\Controllers\LogoutController::class,"logoutUser"]);

Route::get("/ac-info",[\App\Http\Controllers\AccountInfoUpdateController::class,'showAccountInfo']);

Route::post("/ac-info",[\App\Http\Controllers\AccountInfoUpdateController::class,'updateInfo']);


Route::get("/success",function(){
    echo "Success !";
});

Route::get("/fail",function(){
    echo "Success !";
});
