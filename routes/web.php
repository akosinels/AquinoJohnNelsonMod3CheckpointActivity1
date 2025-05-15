<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

Route::get('/', function () {
    return view('welcome');
});

// Items Routes
Route::resource('items', ItemController::class);

// Customers Routes
Route::resource('customers', CustomerController::class);

// Orders Routes
Route::resource('orders', OrderController::class);

// Order Details Routes
Route::resource('order-details', OrderDetailController::class);
