<?php

use Illuminate\Http\Request;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});

Route::name('api.')->group(function() {
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/products/{upc}', 'ProductsController@show')->name('products.show');
    Route::post('/products', 'ProductsController@store')->name('products.store');
    Route::put('/products/{upc}', 'ProductsController@update')->name('products.update');
    Route::delete('/products/{upc}', 'ProductsController@destroy')->name('products.destroy');

    Route::get('/expirations', 'ExpirationsController@index')->name('expirations.index');
    Route::get('/expirations/{id}', 'ExpirationsController@show')->name('expirations.show');
    Route::post('/expirations', 'ExpirationsController@store')->name('expirations.store');
    Route::put('/expirations/{id}', 'ExpirationsController@update')->name('expirations.update');
    Route::delete('/expirations/{id}', 'ExpirationsController@destroy')->name('expirations.destroy');
});
