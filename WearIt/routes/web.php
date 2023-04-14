<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomepageController@index');

Route::get('/product', 'App\Http\Controllers\ProductController@index');

Route::get('/product_list', 'App\Http\Controllers\ProductlistController@index');

Route::get('/cart', 'App\Http\Controllers\CartController@index');

Route::get('/delivery', 'App\Http\Controllers\DeliveryController@index');

Route::get('/order', 'App\Http\Controllers\OrderController@index');

Route::get('/transport', 'App\Http\Controllers\TransportController@index');
