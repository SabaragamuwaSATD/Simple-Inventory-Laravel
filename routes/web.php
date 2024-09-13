<?php

// use App\Models\Post;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


// NOTE: GET Request ////////////////////////////////////////////////////////////////

Route::get('/', function () {
    if(auth()->check()){
        $products = auth()->user()->usersProducts()->latest()->get();
        return view('home', ['products' => $products]);
    }

    return view('home');

});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/create-product', function () {
    return view('create-product');
});


// NOTE: POST Request ////////////////////////////////////////////////////////////////
//Note: user
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Note: product
Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::get('/view-product/{product}', [ProductController::class, 'viewProduct']);
Route::get('/edit-product/{product}', [ProductController::class, 'editProduct']);
Route::put('/edit-product/{product}', [ProductController::class, 'updatedProduct']);
Route::delete('/delete-product/{product}', [ProductController::class, 'deleteProduct']);