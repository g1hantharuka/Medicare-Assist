<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('logout', function () {
    return view('/');
});



Route::get("/",[HomeController::class,'index']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware([
         'user.admin'
    ])->resource(
        'product-category',
        \App\Http\Controllers\ProductCategoryController::class
    );

    Route::middleware([
         'user.admin'
    ])->resource(
        'product',
        \App\Http\Controllers\ProductController::class
    );

    Route::middleware([
         'user.admin'
    ])->resource(
        'user',
        \App\Http\Controllers\UserController::class
    );

    //routes for stock
    Route::middleware([
         'user.admin'
    ])->resource(
        'stock',
        \App\Http\Controllers\StockController::class
    );
});

//Route for the products cards showing page
Route::get('/products',[\App\Http\Controllers\ProductController::class,'showProducts'])->name('products');
