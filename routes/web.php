<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DishesController;


// public
Route::get('/', function () {
    return view('template.home');
})->name('home');

Route::get('/food', function () {
    return view('template.food_results');
})->name('food_result');

Route::get('/profile', function () {
    return view('template.profile');
})->name('profile');

Route::get('/restaurant', function () {
    return view('template.restaurants');
})->name('restaurant');


Route::get('/contact', function () {
    return view('template.contact');
})->name('contact');

Route::get('/checkout', function () {
    return view('template.checkout');
})->name('checkout');


// Route::get('/adminaccount', [UserController::class, "index"])->name('adminaccount');
// Route::get('/staff/dishes', [DishesController::class, "index"])->name('dishes');



// post check log in
Route::post('auth/check', [AuthController::class, 'check'])->name('auth.check');
// check register
Route::post('auth/save', [AuthController::class, 'save'])->name('auth.save');
// check change password
Route::post('auth/edit', [AuthController::class, 'editpass'])->name('editpass');
// log out
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');



// only hiencoday access
Route::get('auth/staff/register/only/hiencoday', [AuthController::class, 'register_staff']);

// check middleware
Route::group(['middleware' => ['AuthCheck']], function () {

    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');

    // add more route need authenticate
    Route::get('/staff', [AdminController::class, 'index'])->name('staff');

    Route::get('/staff/menu', [AdminController::class, 'menu'])->name('staff.menu');

    Route::get('/staff/product/type', [AdminController::class, 'type_product'])->name('staff.type');

    Route::get('/staff/account', [AdminController::class, 'setting_account'])->name('staff.account');
});
