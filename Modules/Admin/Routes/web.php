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
use Modules\Admin\Http\Controllers\AdminController;

Route::group(['middleware'=>'guest'], function(){
    Route::get('/admins/login', [LoginController::class, 'show'])->name('auth.show');
    Route::post('/admins/login', [LoginController::class, 'login'])->name('auth.login');
});
Route::group(['prefix' => 'admins','middleware'=>['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware(
            'permission:superadmin.admin.index'
        );
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create')->middleware(
            'permission:superadmin.admin.create'
        );
        Route::post('/create', [AdminController::class, 'store'])->middleware('permission:superadmin.admin.create');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')->middleware(
            'permission:superadmin.admin.edit'
        );
        Route::post('/edit/{id}', [AdminController::class, 'update'])->middleware('permission:superadmin.admin.edit');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware(
            'permission:superadmin.admin.destroy'
        );
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index')->middleware(
            'permission:products.index'
        );
        Route::get('/create', [ProductController::class, 'create'])->name('products.create')->middleware(
            'permission:products.create'
        );
        Route::post('/create', [ProductController::class, 'store'])->middleware('permission:products.create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit')->middleware(
            'permission:products.edit'
        );
        Route::post('/edit/{id}', [ProductController::class, 'update'])->middleware('permission:products.edit');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware(
            'permission:products.destroy'
        );
    });

//    Route::get('/roles', [RoleController::class, 'index']);

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index')->middleware('permission:orders.index');
        Route::post('/{id}', [OrderController::class, 'change'])->name('orders.change');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware(
            'permission:orders.destroy'
        );
        Route::get('/order-detail/{id}', [OrderController::class, 'show'])->middleware('permission:orderDetails.index');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

