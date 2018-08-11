<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index')->name('admin.dashboard');
Route::get('/products', 'ProductsController@index')->name('admin.products');
Route::get('/products/{id}', 'ProductsController@edit')->name('admin.products.edit');
Route::put('/products/{id}', 'ProductsController@update')->name('admin.products.update');

Route::get('/users/{id}', 'UsersController@edit')->name('admin.users.edit');
