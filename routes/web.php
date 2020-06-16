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

Route::middleware('guest')->group(function(){
	Route::get('login','Auth\LoginController@showLoginForm')->name('login');
	Route::post('login','Auth\LoginController@login')->name('do-login');

	Route::get('register','UserController@register')->name('register');
	Route::post('register','UserController@storeRegister')->name('do-register');

});

//authenticate users
Route::middleware('auth')->group(function(){
	Route::get('/', function(){
		return view('user.index');
	});
	Route::prefix('user')->group(function(){
		Route::name('user.')->group(function(){

			Route::get('/index','HomeController@index')->name('index');
			Route::get('logout','Auth\LoginController@logout')->name('logout');


			Route::get('/order','User\OrderController@create')->name('order');
			Route::post('/order','User\OrderController@store')->name('store-order');


			Route::get('order-detail','User\OrderDetailController@create')->name('order-detail');
			Route::post('order-detail','User\OrderDetailController@store')->name('store-order-detail');

			Route::get('shipment/','User\ShipmentController@create')->name('shipment');
			
		});
	});
});



//authenticate admins
Route::middleware('guest:admin')->group(function(){
	Route::prefix('admin')->group(function(){
		Route::name('admin.')->group(function(){

			Route::get('/login','Auth\AdminLoginController@login')->name('login');
			Route::post('/login','Auth\AdminLoginController@doLogin')->name('do-login');

		});
	});
});

Route::middleware('auth:admin')->group(function(){

	
	Route::prefix('admin')->group(function(){
		Route::name('admin.')->group(function(){

			Route::get('/','Auth\AdminLoginController@index')->name('index');
			Route::get('/logout','Auth\AdminLoginController@logout')->name('logout');

			Route::get('/binding','BindingController@create')->name('binding');
			Route::post('/binding','BindingController@store')->name('store-binding');


			Route::get('/binding/edit/{id}','BindingController@edit')->name('edit-binding');
			Route::post('/binding/edit/{id}','BindingController@update')->name('update-binding');
		});
	});
});
