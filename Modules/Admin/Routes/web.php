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

Route::get('/login','LoginSimpleController@index')->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.home');

    Route::group(['prefix'=>'products'], function (){
        Route::get('/', 'ProductController@index')->name('products.index');
        Route::get('/create', 'ProductController@create')->name('products.create');
        Route::post('/create', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
        Route::post('/edit/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@destroy')->name('products.destroy');
    });


    Route::get('/login', 'LoginController@show')->name('admin.show')->middleware('CheckLogin');
    Route::post('/login', 'LoginController@login')->name('admin.login');
    Route::get('/logout', 'LogoutController@logout')->name('admin.logout');
});
