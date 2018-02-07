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

Route::get('/', 'ProductController@create');

Route::prefix('product')->group(function () {
    Route::post('/', 'ProductController@store');
    Route::get('/', 'ProductController@index');
    Route::put('/{productId}', 'ProductController@update');
});
