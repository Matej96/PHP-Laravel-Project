<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/product_list/{id}', 'App\Http\Controllers\ProductListController@index')
            ->name('product_list.index');

Route::get('/filtered_list/{id}', 'App\Http\Controllers\FilteredController@filtered')
            ->name('filtered_list');

Route::get('/search_list', 'App\Http\Controllers\FilteredController@search')
    ->name('search_list');

Route::get('/search_filter_list/{word}', 'App\Http\Controllers\FilteredController@search_filter')
    ->name('search_filter_list');

Route::get('/product/{id}', 'App\Http\Controllers\ProductController@index')
    ->name('product_page');

Route::get('/cart', 'App\Http\Controllers\CartController@index')
    ->name('cart');

Route::post('/cart/add', 'App\Http\Controllers\CartController@addToCart')
    ->name('cart_add');

Route::delete('/cart/delete', 'App\Http\Controllers\CartController@removeFromCart')
    ->name('cart_delete');

Route::delete('/image/delete', 'App\Http\Controllers\AdminaddController@removeImage')
    ->name('image_delete')
    ->middleware('admin');

Route::get('/transport', 'App\Http\Controllers\TransportController@index')
    ->name('transport');

Route::post('/finish', 'App\Http\Controllers\TransportController@finish_order')
    ->name('finish_order');

Route::post('/order', 'App\Http\Controllers\DeliveryController@index')
    ->name('create_order');

Route::get('/admin', 'App\Http\Controllers\AdminController@index')
    ->name('admin')
    ->middleware('admin');

Route::get('/admin_add_product/{id?}', 'App\Http\Controllers\AdminaddController@index')
    ->name('admin_add_product')
    ->middleware('admin');

Route::post('/remove-data/{id}', [\App\Http\Controllers\AdminController::class, 'removeData'])->name('remove.data');

Route::post('/add/product/{id?}', [\App\Http\Controllers\AdminaddController::class, 'addProduct'])->name('add_product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
