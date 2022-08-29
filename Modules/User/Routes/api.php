<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\OrderController;
use Modules\User\Http\Controllers\CategoryProductController;
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

Route::group(['middleware'=>'api', 'prefix'=>'auth'], function (){


    Route::post('/logout',[AuthController::class,'logout']);

});

Route::post('/buy-on-cart',[OrderController::class,'buyOnCart']);

Route::post('/categories',[CategoryProductController::class, 'index']);

Route::post('/category-product/{slug}',[CategoryProductController::class,'show']);
