<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

Route::get('/', function () {
    return view('welcome');
});

// Customer Route with parameters
Route::get('/customer/{customerId}/{name}/{address}', [CustomerController::class, 'show'])
    ->name('customers.show');

// Item Route with parameters
Route::get('/item/{itemNo}/{name}/{price}', [ItemController::class, 'show'])
    ->name('items.show');

// Order Route with parameters
Route::get('/order/{customerId}/{name}/{orderNo}/{date}', [OrderController::class, 'show'])
    ->name('orders.show');

// Order Details Route with parameters
Route::get('/order-detail/{transNo}/{orderNo}/{itemId}/{name}/{price}/{qty}', [OrderDetailController::class, 'show'])
    ->name('order-details.show');

// Items Routes
Route::resource('items', ItemController::class);

// Customers Routes
Route::resource('customers', CustomerController::class);

// Orders Routes
Route::resource('orders', OrderController::class);

// Order Details Routes
Route::resource('order-details', OrderDetailController::class);
