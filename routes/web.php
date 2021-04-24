<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;


// public
Route::get('/', function () {
    return view('index');
})->name('home');



Route::post('auth/check', [AuthController::class, 'check'])->name('auth.check');

Route::post('auth/save', [AuthController::class, 'save'])->name('auth.save');

Route::post('auth/edit', [AuthController::class, 'editpass'])->name('editpass');

Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

// only hiencoday access
Route::get('auth/staff/register/only/hiencoday', [AuthController::class, 'register_staff']);

// check middleware
Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');
    

    // add more route need authenticate
    Route::get('/staff', [AdminController::class, 'index'])->name('staff');

    Route::get('/staff/menu', [AdminController::class, 'products'])->name('staff.menu');

    Route::get('/staff/product/type', [AdminController::class, 'type_product'])->name('staff.type');

    Route::get('/staff/setting/account', [AdminController::class, 'setting_account'])->name('staff.account');
});
