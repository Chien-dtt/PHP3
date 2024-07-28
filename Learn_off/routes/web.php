<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChienController;
use App\Http\Controllers\Admin\ProductController;

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


Route::get('/list-products',[UserController::class, 'showProduct']);

Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
    Route::get('list-products', [UserController::class, 'listProducts'])->name('listProducts');

    Route::get('add-products', [UserController::class, 'addProducts'])->name('addProducts');

    Route::post('add-products', [UserController::class, 'addPostProducts'])->name('addPostProducts');

    Route::get('delete-products/{idProduct}', [UserController::class, 'deleteProduct'])->name('deleteProduct');

    Route::get('update-products/{idProduct}', [UserController::class, 'updateProduct'])->name('updateProduct');

    Route::post('update-products/{idProduct}', [UserController::class, 'updatePostProduct'])->name('updatePostProduct');

});

Route::get('/test', function(){
    return view('admin.products.list-product');
});

Route::get('/test2', function(){
    return view('admin.products.add-product');
});


Route::group(['prefix' => 'admin', 'as' => '.admin'], function(){
    Route::group(['prefix' => 'product', 'as' => '.product'], function(){
        // http://127/0.0.1:8000/admin/products/.....
        Route::get('/', [ProductController::class, 'listProducts'])->name('listProducts');

        Route::get('add-product', [ProductController::class],'addProduct')->name('addProduct');
    });
});