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

Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::get('/products', 'ProductsController@index')->name('admin.products');
Route::post('/products', 'ProductsController@store')->name('admin.products.store');
Route::post('/products/walmart', 'ProductsController@walmart')->name('admin.products.store.walmart');
Route::get('/products/new', 'ProductsController@create')->name('admin.products.create');
Route::get('/products/{id}', 'ProductsController@edit')->name('admin.products.edit');
Route::put('/products/{id}', 'ProductsController@update')->name('admin.products.update');

Route::get('/expirations', 'ExpirationsController@index')->name('admin.expirations');
Route::get('/expirations/new/{upc?}', 'ExpirationsController@create')->name('admin.expirations.create');
Route::post('/expirations', 'ExpirationsController@store')->name('admin.expirations.store');
Route::put('/expirations/{id}/check', 'ExpirationsController@check')->name('admin.expirations.check');
Route::get('/expirations/{id}', 'ExpirationsController@edit')->name('admin.expirations.edit');
Route::put('/expirations/{id}', 'ExpirationsController@update')->name('admin.expirations.update');
Route::delete('/expirations/{id}', 'ExpirationsController@destroy')->name('admin.expirations.destroy');

Route::get('/users/{id}', 'UsersController@edit')->name('admin.users.edit');
Route::put('/users/{id}', 'UsersController@update')->name('admin.users.update');
