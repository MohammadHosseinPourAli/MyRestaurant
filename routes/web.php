<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/order', [OrderController::class, 'index'])->middleware('auth')->name('order');
Route::get('/order/mainFood', [OrderController::class, 'mainFood'])->middleware('auth')->name('order.mainFood');
Route::get('/order/drinks', [OrderController::class, 'drinks'])->middleware('auth')->name('order.drinks');
Route::get('/order/appetizer', [OrderController::class, 'appetizer'])->middleware('auth')->name('order.appetizer');
Route::get('/order/dessert', [OrderController::class, 'dessert'])->middleware('auth')->name('order.dessert');
Route::post('/update-count-food', [OrderController::class, 'updateFoodCount'])->middleware('auth')->name('update.food.count');
Route::post('/order', [OrderController::class, 'store'])->middleware('auth')->name('order.store');
Route::get('/my-orders', [OrderController::class, 'myOrders'])->middleware('auth')->name('order.myOrders');
route::get('/menu',[MenuController::class, 'index'])->middleware('auth')->name('menu');
Route::get('/menu/addFood', [MenuController::class, 'create'])->middleware('auth')->name('menu.addFood');
route::post('/menu/addFood', [MenuController::class, 'store'])->middleware('auth')->name('menu.addFood-store');
Route::get('/menu/{id}', [MenuController::class, 'show'])->middleware('auth')->name('menu.show');
Route::post('/menu/{id}', [MenuController::class, 'edit_store'])->middleware('auth')->name('menu.edit.store');
Route::get('/menu/surePanel/{id}', [MenuController::class, 'surePanel'])->middleware('auth')->name('menu.surePanel');
Route::delete('/menu/surePanel/{id}', [MenuController::class, 'delete'])->middleware('auth')->name('menu.delete');
Route::get('/orders', [OrderController::class, 'emp_orders'])->middleware('auth')->name('emp-orders');
Route::post('/orders', [OrderController::class, 'updateOrdersStatus'])->middleware('auth')->name('update-orders-status');
