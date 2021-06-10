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

// for chat
use App\Http\Controllers\ChatController;


// public
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/restaurant-details/{id}', [PublicController::class, 'menu'])->name('menu');

Route::get('/restaurants', [RestaurantController::class, 'restaurants'])->name('restaurants');

// add order
Route::post('add/record/order', [RestaurantController::class, 'pay_now'])->name('pay_now');
// check Coupons
Route::post('check/Coupons', [RestaurantController::class, 'checkCoupons'])->name('checkCoupons');


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
    // route for chat
    // Route::get('chat/test', [ChatController::class, 'getMoreMess']);

    Route::get('chat/chat', [ChatController::class, 'index'])->name('get.chat');
    Route::get('chat/get/user/receiver', [ChatController::class, 'getReceiver'])->name('get.receiver');
    Route::get('chat/load/more/message', [ChatController::class, 'getMoreMess'])->name('get.more.message');
    Route::get('chat/get/{username}', [ChatController::class, 'getOneUser'])->name('get.user_chat');
    Route::post('chat/chat', [ChatController::class, 'submit'])->name('post.chat');




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
    Route::get('/staff/dish/store', [DishesController::class, "store"])->name('dish-store');
    Route::get('/staff/orderStaff', [OrderController::class, "index"])->name('orderStaff');
    Route::get('/staff/{order}/orderDetail', [OrderController::class, "show"])->name('order-details');

    Route::post('/staff/editDish/{dish}', [DishesController::class, "update"])->name('edit-dish');
    Route::post('/staff/deleteDish/{dish}', [DishesController::class, "destroy"])->name('delete-dish');
    Route::post('/staff/orderStatus/{order}', [OrderController::class, "update"])->name('update-order');
    Route::post('/user/settingUser/{user}', [UserController::class, "editpass"]);
    Route::post('/staff/searchOrder', [OrderController::class, "search"])->name('search-order');
    Route::post('/staff/status/searchOrder', [OrderController::class, "searchStatus"])->name('search-order-status');
    Route::post('/user/{users}/delete', [UserController::class, "destroy"])->name("destroyUser");
    Route::post('/staff/{order}/orderCancel', [OrderController::class, "cancel"])->name('reject-order');

    // Route::post('auth/edit', [AuthController::class, 'editpass'])->name('editpass');


    // load all order (orderStatus==6)
    Route::get('get/all/past/order', [PublicController::class, 'get_past_order']);
});
