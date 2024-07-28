<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthenController;

// Route::get('list-product', function(){
//     return view('admin.products.list-product');
// });



Route::get('signup', [AuthenController::class, 'signup'])->name('signup');
Route::post('signup', [AuthenController::class, 'postSignup'])->name('postSignup');
Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');





// Admin
Route::group([
    'prefix'    => 'admin',
    'as'        => 'admin.',
    'middleware' => 'checkAdmin'
], function(){
    // Quản lý User
    Route::group([
        'prefix'    => 'users',
        'as'        => 'users.'
    ], function(){
        Route::get('/', [UserController::class, 'listUsers'])->name('listUsers');
        Route::post('add-user', [UserController::class, 'addUsers'])->name('addUsers');
        Route::delete('delete-user', [UserController::class, 'deleteUsers'])->name('deleteUsers');
        Route::get('detail-user', [UserController::class, 'detailUsers'])->name('detailUsers');
        Route::patch('edit-user', [UserController::class, 'editUsers'])->name('editUsers');
    });
});




// User
Route::get('master', function(){
    return view('users.persons.master');
});