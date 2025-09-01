<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/mainFood', [OrderController::class, 'mainFood'])->name('order.mainFood');
Route::get('/order/drinks', [OrderController::class, 'drinks'])->name('order.drinks');
Route::get('/order/appetizer', [OrderController::class, 'appetizer'])->name('order.appetizer');
Route::get('/order/dessert', [OrderController::class, 'dessert'])->name('order.dessert');
Route::post('/update-count-food', [OrderController::class, 'updateFoodCount'])->name('update.food.count');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');