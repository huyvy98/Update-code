<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\OrderController;
use Modules\User\Http\Controllers\CategoryController;
use Modules\User\Http\Controllers\ProductController;
use Modules\User\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('auth/login', [AuthController::class, 'login'])->name('login.user');

Route::post('auth/register', [AuthController::class, 'register']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{id}/products', [ProductController::class, 'getProduct']);

Route::group(['middleware' => 'auth_api:api'], function () {
    Route::get('auth/test', [AuthController::class, 'test']);

    Route::get('/info',[UserController::class,'show']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/orders', [OrderController::class, 'order']);

});
