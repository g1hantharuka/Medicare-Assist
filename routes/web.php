<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Plan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Models\Booking;



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

Route::get('dev', function () {

    dd(auth()->user()->subscriptions);

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

    //routes for subscriptions
    Route::middleware([
         'user.admin'
    ])->resource(
        'subscription',
        \App\Http\Controllers\SubscriptionController::class
    );

    // routes for booking
    Route::middleware([
         'user.admin'
    ])->resource(
        'booking',
        \App\Http\Controllers\BookingController::class
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
    Route::post('subscription', [PlanController::class, 'subscribe'])->name("subscription.create");

    Route::get('/users/subscription', function () {
    return view('user.subscription.index', [
        'subscriptions' => Subscription::where('user_id', auth()->user()->id)->orderBy('id', 'ASC')->paginate(10),
        'users' => User::all(),
        'plans' => Plan::all()
    ]);
    });

    Route::get('/users/booking', function () {
    return view('user.booking.index', [
        'bookings' => Booking::where('user_id', auth()->user()->id)->orderBy('id', 'ASC')->paginate(10),
        'users' => User::all(),
        // 'plans' => Plan::all()
    ]);
    });

    //route forpages.subscription_success
    Route::get('/pages/subscription_success', function () {
        return view('pages.subscription_success');
    })->name('pages.subscription_success');

    // //route for booking create booking controller
    // Route::post('/booking/create', [BookingController::class,'store'])->name('booking.create');

    // //route for booking_success
    // Route::get('/booking/success', function () {
    //     return view('pages.booking_success');
    // })->name('booking.success');
});
//route for dashbaord function in DashboardController
Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');




Route::get('/sub', function () {
    // Fetch all users from the database
    $users = User::paginate(10); // Example pagination, change as needed

    // Pass the users data to the Blade view
    return view('admin.sub.index', ['users' => $users]);
});

//route for booking create booking controller
Route::post('/booking/create', [BookingController::class,'store'])->name('booking.create');

//Resource for booking
    // Route::resource('booking', BookingController::class);

    //route for booking_success
    Route::get('/booking/success', function () {
        return view('pages.booking_success');
    })->name('booking.status');
