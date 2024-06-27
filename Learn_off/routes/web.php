<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// http://127.0.0.1:8000  => Base urls
// GET - POST => Method HTTP

Route::get('/test', function(){
    echo 'Trang chu - Home';
});


Route::get('/test', function(){
    echo 'Hello World';
});

Route::get('/list-user',[UserController::class, 'showUser']);

// Params và Slug

// Params : http://127.0.0.1:8000/update-user?id=1&name=chien
Route::get('/update-user',[UserController::class, 'updateUser']);

// Slug : http://127.0.0.1:8000/get-user?id=1&name=chien
Route::get('/get-user/{id}/{name?}',[UserController::class, 'getUser']);

Route::get('/profile-user',[ChienController::class, 'profileChien']);