<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\ProductController;
use Modules\Admin\Http\Controllers\LoginController;
use Modules\Admin\Http\Controllers\LogoutController;
use Modules\Admin\Http\Controllers\OrderController;
use Modules\Admin\Http\Controllers\OrderDetailController;


Route::get('/login', 'LoginSimpleController@index')->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.home')->middleware('CheckLogout');

    Route::group(['prefix' => 'products', 'middleware' => 'CheckLogout'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store']);
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/edit/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

//    Route::resource('/orders',OrderController::class);
    Route::group(['prefix' => 'orders', 'middleware' => 'CheckLogout'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/{id}/user/{$idUs}', [OrderDetailController::class, 'index'])->name('orders.index');
    });

    Route::get('/login', 'LoginController@show')->name('admin.show')->middleware('CheckLogin');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::get('/logout', 'LogoutController@logout')->name('admin.logout');
});
