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
use Modules\Admin\Http\Controllers\AdminController;


Route::get('/login', 'LoginSimpleController@index')->name('login');
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('CheckLogout');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/create', [AdminController::class, 'store']);
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/edit/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

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
        Route::get('/order-detail/{id}', [OrderController::class, 'show']);
    });

    Route::get('/login', [LoginController::class, 'show'])->name('admin.show')->middleware('CheckLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});
