<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\OrderController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['middleware'=>'api', 'prefix'=>'auth'], function (){
    Route::post('/login',[AuthController::class,'login']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/logout',[AuthController::class,'logout']);

//    Route::get('/order',[OrderController::class,'getCart']);
//    Route::post('/order/{id}',[OrderController::class,'addToCart']);
//    Route::post('/updateCart/{id}',[OrderController::class,'updateCart']);

//    Route::post('/deleteCart/{id}',[OrderController::class,'destroy']);
});

Route::post('/buy-on-cart',[OrderController::class,'buyOnCart']);
