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

// Thêm 1 api detail của user khi đăng nhập

Route::post('auth/login', [AuthController::class, 'login']);

Route::post('auth/register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth.api:api'], function () {
    Route::get('/info',[UserController::class,'show']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/orders', [OrderController::class, 'order']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/categories/{id}/products', [ProductController::class, 'getProduct']);
});
