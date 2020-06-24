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


			Route::get('view-detail','User\ViewDetailController@index')->name('view-detail');
			Route::post('view-detail','User\ViewDetailController@viewDetail')->name('show-view-detail');

			
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

			Route::get('/binding','Admin\BindingController@index')->name('binding');
			Route::post('binding','Admin\BindingController@store')->name('store-binding');


			Route::get('/binding/edit/{id}','Admin\BindingController@edit')->name('edit-binding');
			Route::post('/binding/edit/{id}','Admin\BindingController@update')->name('update-binding');


			Route::get('/tables','Admin\TablesController@index')->name('tables');

			Route::get('/shipment-status','Admin\ShipmentStatusController@index')->name('shipment-status');

			Route::get('/payment-terms','Admin\PaymentTermController@index')->name('payment-terms');

			Route::get('/incoterms','Admin\IncotermController@index')->name('incoterms');

			Route::get('/packing','Admin\PackingController@index')->name('packing');

			Route::get('/container-size','Admin\ContainerSizeController@index')->name('container-size');	
			Route::get('/certificate-of-origin','Admin\CertificateOfOriginController@index')->name('certificate-of-origin');	
			Route::get('/po-status','Admin\PoStatusController@index')->name('po-status');	
			Route::get('/weight-unit','Admin\WeightUnitController@index')->name('weight-unit');	
			Route::get('/pod','Admin\PodController@index')->name('pod');	
			Route::get('/supplier','Admin\SupplierController@index')->name('supplier');
			Route::get('/origin','Admin\OriginController@index')->name('origin');
			Route::get('/manufacturer','Admin\ManufacturerController@index')->name('manufacturer');
			Route::get('/customer','Admin\CustomerController@index')->name('customer');
			Route::get('/product','Admin\ProductController@index')->name('product');
		});
	});
});
