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

Route::get('/list-users',[UserController::class, 'showUser']);

// Params và Slug

// Params : http://127.0.0.1:8000/update-user?id=1&name=chien
Route::get('/update-user',[UserController::class, 'updateUser']);

// Slug : http://127.0.0.1:8000/get-user?id=1&name=chien
Route::get('/get-user/{id}/{name?}',[UserController::class, 'getUser']);

Route::get('/profile-user',[ChienController::class, 'profileChien']);

Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
    Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');

    Route::get('add-users', [UserController::class, 'addUsers'])->name('addUsers');

    Route::post('add-users', [UserController::class, 'addPostUsers'])->name('addPostUsers');

    Route::get('delete-users/{idUser}', [UserController::class, 'deleteUser'])->name('deleteUser');
});