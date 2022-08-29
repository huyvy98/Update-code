<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\OrderController;
use Modules\User\Http\Controllers\CategoryController;
use Modules\User\Http\Controllers\ProductController;

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
Route::post('auth/login',[AuthController::class,'login']);

Route::post('auth/register', [AuthController::class, 'register']);

Route::group(['middleware'=>'api'], function (){
    Route::post('/logout',[AuthController::class,'logout']);

    Route::post('/buy-on-cart',[OrderController::class,'buyOnCart']);

    Route::get('/categories',[CategoryController::class, 'index']);

    Route::get('/categories/{id}',[CategoryController::class,'show']);

    Route::get('/products',[ProductController::class, 'index']);

//    Route::get('/products/{id}',[ProductController::class,'show']);
});



