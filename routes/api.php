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
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
});

Route::middleware('api')->get('/products', 'ProductsController@index')->name('api.products');
Route::middleware('api')->get('/products/{upc}', 'ProductsController@show')->name('api.products.show');
Route::middleware('api')->post('/products', 'ProductsController@store')->name('api.products.store');
Route::middleware('api')->put('/products/{upc}', 'ProductsController@update')->name('api.products.update');
Route::middleware('api')->delete('/products/{upc}', 'ProductsController@destroy')->name('api.products.destroy');

Route::middleware('api')->get('/expirations', 'ExpirationsController@index')->name('api.expirations');
Route::middleware('api')->get('/expirations/{id}', 'ExpirationsController@show')->name('api.expirations.show');
Route::middleware('api')->post('/expirations', 'ExpirationsController@store')->name('api.expirations.store');
Route::middleware('api')->put('/expirations/{id}', 'ExpirationsController@update')->name('api.expirations.update');
Route::middleware('api')->delete('/expirations/{id}', 'ExpirationsController@destroy')->name('api.expirations.destroy');
