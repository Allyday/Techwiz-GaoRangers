<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;


// public
Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/restaurant-details/{id}', [PublicController::class, 'menu'])->name('menu');

Route::get('/restaurants', [RestaurantController::class, 'restaurants'])->name('restaurants');

// add order
Route::post('add/record/order', [RestaurantController::class, 'pay_now']);


// post location
Route::post('/save_location', [LocationController::class, 'save_location'])->name('save_location');

// post search restaurant from home
Route::post('search/restaurants', [RestaurantController::class, 'searchFromHome'])->name('search_restaurants');

// post filter restaurant from restaurant
Route::post('filter/restaurants', [RestaurantController::class, 'filter'])->name('filter_restaurants');


// post feedback
Route::post('submit/feedback', [PublicController::class, 'save_feedback'])->name('save_feedback');
// post check log in
Route::post('auth/check', [AuthController::class, 'check'])->name('auth.check');
// check register
Route::post('auth/save', [AuthController::class, 'save'])->name('auth.save');
// check change password
Route::get('auth/edit', [AuthController::class, 'editpass'])->name('editpass');
// log out
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');



// only hiencoday access
Route::get('auth/staff/register/only/hiencoday', [AuthController::class, 'register_staff']);

// check middleware
Route::group(['middleware' => ['AuthCheck']], function () {

    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('/feedback', [PublicController::class, 'feedback'])->name('feedback');

    Route::get('/order-history', [PublicController::class, 'history'])->name('order-history');

    Route::get('/checkout', [PublicController::class, 'checkout'])->name('checkout');

    // route for staff
    Route::get('/user/{user}/setting', [UserController::class, 'setting'])->name('setting');
    
    
    
    Route::get('/staff/index/{option}', [AdminController::class, 'index'])->name('staff');
    Route::get('/staff/menu', [AdminController::class, 'menu'])->name('staff.menu');
    Route::get('/staff/product/type', [AdminController::class, 'type_product'])->name('staff.type');
    Route::get('/staff/account', [UserController::class, "index"])->name('adminaccount');
    Route::get('/staff/dishes', [DishesController::class, "index"])->name('dishes');
    Route::get('/staff/{dish}/edit', [DishesController::class, "edit"]);
    Route::get('/staff/dish/create', [DishesController::class, "create"]);
    Route::get('/staff/dish/store', [DishesController::class, "store"]);
    Route::get('/staff/orderStaff', [OrderController::class, "index"])->name('orderStaff');
    Route::get('/staff/{order}/orderDetail', [OrderController::class, "show"]);
    
    Route::post('/staff/editDish/{dish}', [DishesController::class, "update"]);
    Route::post('/staff/deleteDish/{dish}', [DishesController::class, "destroy"]);
    Route::post('/staff/orderStatus/{order}', [OrderController::class, "update"]);
    Route::post('/user/settingUser/{user}', [UserController::class, "editpass"]);
    Route::post('/staff/searchOrder', [OrderController::class, "search"]);
    Route::post('/staff/status/searchOrder', [OrderController::class, "searchStatus"]);
    Route::post('/user/{users}/delete', [UserController::class, "destroy"])->name("destroyUser");


    // Route::post('auth/edit', [AuthController::class, 'editpass'])->name('editpass');


    // load all order (orderStatus==6)
    Route::get('get/all/past/order', [PublicController::class, 'get_past_order']);
});

