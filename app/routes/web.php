<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::resource('/products', ProductController::class);

Route::resource('/orders', OrderController::class);