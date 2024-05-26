<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;

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

Route::get('/product/{product:slug}', [
    \App\Http\Controllers\ProductController::class,
    'show'
])->name('product.show');


Route::get('/category/{slug}', [
    \App\Http\Controllers\ProductCategoryController::class,
    'show'
])->name('category.show');


//Routes for the nav bar pages without controllers
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/services', function () {
    return view('pages.services');
})->name('services');

//pricing
Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

// Route::middleware("auth")->group(function () {

// });

Route::get('plans/{plan}', [
    \App\Http\Controllers\PlanController::class,
    'show'
])->name('plans.show');


Route::middleware("auth")->group(function () {
    // Route::get('plans', [PlanController::class, 'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});
