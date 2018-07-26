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

Route::middleware('api')->get('/products', 'ProductsController@index');
Route::middleware('api')->get('/products/{upc}', 'ProductsController@show');
Route::middleware('ezauth:api')->post('/products', 'ProductsController@store');
