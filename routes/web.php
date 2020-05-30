<?php

use Illuminate\Support\Facades\Route;

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

/**
 * PUBLIC
 */

Route::get('/', function () {
    return view('welcome');
});

/**
 * ADMIN
 */

Route::group(['prefix' => 'admin'], function () {

	Route::get('/', [
		'uses' => 'AdminController@index',
		'as' => 'admin.index'
	]);

	Route::get('/items/create', [
		'uses' => 'ItemsController@addNewItem',
		'as' => 'admin.create.item'
	]);

	Route::post('/items/create', [
		'uses' => 'ItemsController@store',
		'as' => 'admin.create.item'
	]);

	Route::get('/items/edit/{id}', [
		'uses' => 'ItemsController@show',
		'as' => 'admin.edit.item'
	]);

	Route::put('/items/edit/{id}', [
		'uses' => 'ItemsController@edit',
		'as' => 'admin.edit.item'
	]);

	Route::post('/login', [
		'uses' => 'AdminController@login',
		'as' => 'admin.login'
	]);

	Route::post('/logout', [
		'uses' => 'AdminController@logout',
		'as' => 'admin.logout'
	]);

	
});

/** 
 * USERS
 */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add-to-cart/{id}', 'CartController@add')->name('items.addToCart');
Route::get('/cart', 'CartController@show')->name('cart.show');
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('/clear-cart', 'CartController@clear')->name('cart.clear');
Route::post('/payment',  'CartController@pay')->name('payment');









