<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AdminController::class, 'index'])->name('home');

Route::get('/allproduct', function () {
    return view('view_admin.productAll');
})->name('allproduct');

Route::get('/typeproduct', function () {
    return view('view_admin.typeproduct');
})->name('typeproduct');


Route::get('/adminaccount', function () {
    return view('view_admin.adminaccount');
})->name('adminaccount');



Route::post('auth/check', [AuthController::class, 'check'])->name('auth.check');

Route::post('auth/save', [AuthController::class, 'save'])->name('auth.save');

Route::post('auth/edit', [AuthController::class, 'editpass'])->name('editpass');

Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');



// check middleware
Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('/', [AdminController::class, 'index'])->name('home');
    // add more route need authenticate
});

