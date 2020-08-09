<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::prefix('v1')->group(function(){
	Route::name('v1.')->group(function(){
		Route::middleware('api')->group(function(){
			Route::post('login','API\AccountController@login');
			Route::post('logout','API\AccountController@logout');
			Route::post('refresh','API\AccountController@refresh');
			Route::get('me','API\AccountController@me');
			Route::get('catalog','API\CatalogController@catalog');
			Route::post('order','API\OrderController@store');
		});
	});
});