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

Route::middleware('guest:web')->group(function(){
	Route::get('login','LoginController@login')->name('login');
	Route::post('login','LoginController@doLogin')->name('do-login');
	Route::get('register','LoginController@register')->name('register');
	Route::post('register','LoginController@storeRegister')->name('do-register');
});

Route::middleware('auth:web')->group(function(){
	Route::get('/','IndexController@index')->name('index');
	Route::get('logout','LoginController@logout')->name('logout');
});