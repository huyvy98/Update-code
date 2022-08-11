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

//Route::get('/login','LoginController@index')->name('login');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
//    Route::get('/', 'ProductController@index');
//    Route::get('/products', 'ProductController@index');
//    Route::get('/products/store', 'ProductController@store')->name('products.create');
//    Route::get('/products/edit/{id}', 'ProductController@edit')->name('products.edit');
//    Route::get('/products/delete', 'ProductController@destroy')->name('products.delete');
    Route::resource('products', ProductController::class);
});
