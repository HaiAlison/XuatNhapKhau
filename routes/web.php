<?php

use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function(){
	Route::get('login','Auth\LoginController@showLoginForm')->name('login');
	Route::post('login','Auth\LoginController@login')->name('do-login');
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
			Route::post('shipment/','User\ShipmentController@store')->name('store-shipment');
			Route::get('/shipment/{id}','User\ShipmentController@create_id')->name('shipment_id');


			Route::get('view-detail','User\ViewDetailController@index')->name('view-detail');
			Route::post('view-detail','User\ViewDetailController@viewDetail')->name('show-view-detail');

			Route::get('payment-local','User\PaymentLocalController@index')->name('payment-local');
			Route::post('payment-local','User\PaymentLocalController@show')->name('show-payment-local');
			Route::post('payment-local-s','User\PaymentLocalController@store')->name('store-payment-local');

			Route::get('edit-payment-local/{po_no}/{sub_po}/{type_service}','User\PaymentLocalController@edit')->name('edit-payment-local');
			Route::post('edit-payment-local/{po_no}/{sub_po}/{type_service}','User\PaymentLocalController@update')->name('update-payment-local');

			Route::get('/payment-overseas','User\PaymentOverseaController@create')->name('payment-overseas');
			Route::post('/show-payment-overseas','User\PaymentOverseaController@show')->name('show-payment-overseas');
			Route::get('/export','User\PaymentOverseaContrller@export')->name('export');
			Route::get('/create-payment-overseas/{po_no_id}/{sub_po_id}','User\PaymentOverseaController@create_id')->name('create-payment-overseas');

			
			Route::get('excel','User\PaymentLocalController@export')->name('excel');
			Route::get('choose-date','User\PaymentLocalController@chooseDay')->name('choose-day');

			Route::get('report/{i}','User\InvoiceController@index')->name('order-report');
			Route::post('show-po/{type}','User\InvoiceController@selectPO')->name('show-po');
			Route::post('show-detail-po','User\InvoiceController@selectSubPO')->name('show-detail-po');
			Route::post('show-detail-local','User\InvoiceController@showPaymentLocal')->name('show-detail-local');
			Route::post('show-detail-oversea','User\InvoiceController@showPaymentOversea')->name('show-detail-oversea');

			Route::post('report','User\InvoiceController@printPDF')->name('print');
			Route::post('local-report','User\InvoiceController@printLocalPDF')->name('print-local');
			Route::post('oversea-report','User\InvoiceController@printOverseaPDF')->name('print-oversea');
			
		});
	});
});



//authenticate admins
Route::prefix('admin')->group(function(){
	Route::name('admin.')->group(function(){

		Route::get('/login','Auth\AdminLoginController@login')->name('login');
		Route::post('/login','Auth\AdminLoginController@doLogin')->name('do-login');

	});
});

Route::middleware(['auth','admin'])->group(function(){

	
	Route::prefix('admin')->group(function(){
		Route::name('admin.')->group(function(){

			Route::get('/','Auth\AdminLoginController@index')->name('index');
			Route::get('/logout','Auth\AdminLoginController@logout')->name('logout');

			Route::get('/binding','Admin\BindingController@index')->name('binding');

			Route::get('/create-binding','Admin\BindingController@create')->name('create-binding');
			Route::post('create-binding','Admin\BindingController@store')->name('store-binding');


			Route::get('/binding/edit/{id}','Admin\BindingController@edit')->name('edit-binding');
			Route::post('/binding/edit/{id}','Admin\BindingController@update')->name('update-binding');


			Route::get('/tables','Admin\TablesController@index')->name('tables');


			Route::get('/shipment-status','Admin\ShipmentStatusController@index')->name('shipment-status');

			Route::get('/create-shipment-status','Admin\ShipmentStatusController@create')->name('create-shipment_status');
			Route::post('create-shipment-status','Admin\ShipmentStatusController@store')->name('store-shipment_status');

			Route::get('/shipment-status/edit/{id}','Admin\ShipmentStatusController@edit')->name('edit-shipment_status');
			Route::post('/shipment-status/edit/{id}','Admin\ShipmentStatusController@update')->name('update-shipment_status');


			Route::get('/payment-terms','Admin\PaymentTermController@index')->name('payment-terms');

			Route::get('/create-payment-terms','Admin\PaymentTermController@create')->name('create-payment_terms');
			Route::post('create-payment-terms','Admin\PaymentTermController@store')->name('store-payment_terms');

			Route::get('/payment-terms/edit/{id}','Admin\PaymentTermController@edit')->name('edit-payment_terms');
			Route::post('/payment-terms/edit/{id}','Admin\PaymentTermController@update')->name('update-payment_terms');


			Route::get('/incoterms','Admin\IncotermController@index')->name('incoterms');

			Route::get('/create-incoterms','Admin\IncotermController@create')->name('create-incoterms');
			Route::post('create-incoterms','Admin\IncotermController@store')->name('store-incoterms');

			Route::get('/incoterms/edit/{id}','Admin\IncotermController@edit')->name('edit-incoterms');
			Route::post('/incoterms/edit/{id}','Admin\IncotermController@update')->name('update-incoterms');


			Route::get('/packing','Admin\PackingController@index')->name('packing');

			Route::get('/create-packing','Admin\PackingController@create')->name('create-packing');
			Route::post('create-packing','Admin\PackingController@store')->name('store-packing');

			Route::get('/packing/edit/{id}','Admin\PackingController@edit')->name('edit-packing');
			Route::post('/packing/edit/{id}','Admin\PackingController@update')->name('update-packing');


			Route::get('/container-size','Admin\ContainerSizeController@index')->name('container-size');	

			Route::get('/create-container-size','Admin\ContainerSizeController@create')->name('create-container_size');
			Route::post('create-container-size','Admin\ContainerSizeController@store')->name('store-container_size');

			Route::get('/container-size/edit/{id}','Admin\ContainerSizeController@edit')->name('edit-container_size');
			Route::post('/container-size/edit/{id}','Admin\ContainerSizeController@update')->name('update-container_size');


			Route::get('/certificate-of-origin','Admin\CertificateOfOriginController@index')->name('certificate-of-origin');

			Route::get('/create-certificate-of-origin','Admin\CertificateOfOriginController@create')->name('create-certificate_of_origin');
			Route::post('create-certificate-of-origin','Admin\CertificateOfOriginController@store')->name('store-certificate_of_origin');

			Route::get('/certificate-of-origin/edit/{id}','Admin\CertificateOfOriginController@edit')->name('edit-certificate_of_origin');
			Route::post('/certificate-of-origin/edit/{id}','Admin\CertificateOfOriginController@update')->name('update-certificate_of_origin');


			Route::get('/po-status','Admin\PoStatusController@index')->name('po-status');	

			Route::get('/create-po-status','Admin\PoStatusController@create')->name('create-po_status');
			Route::post('create-po-status','Admin\PoStatusController@store')->name('store-po_status');

			Route::get('/po-status/edit/{id}','Admin\PoStatusController@edit')->name('edit-po_status');
			Route::post('/po-status/edit/{id}','Admin\PoStatusController@update')->name('update-po_status');


			Route::get('/weight-unit','Admin\WeightUnitController@index')->name('weight-unit');	

			Route::get('/create-weight-unit','Admin\WeightUnitController@create')->name('create-weight_unit');
			Route::post('create-weight-unit','Admin\WeightUnitController@store')->name('store-weight_unit');

			Route::get('weight-unit/edit/{id}','Admin\WeightUnitController@edit')->name('edit-weight_unit');
			Route::post('/weight-unit/edit/{id}','Admin\WeightUnitController@update')->name('update-weight_unit');


			Route::get('/pod','Admin\PodController@index')->name('pod');	

			Route::get('/create-pod','Admin\PodController@create')->name('create-pod_name');
			Route::post('create-pod','Admin\PodController@store')->name('store-pod_name');

			Route::get('/pod/edit/{id}','Admin\PodController@edit')->name('edit-pod_name');
			Route::post('/pod/edit/{id}','Admin\PodController@update')->name('update-pod_name');


			Route::get('/supplier','Admin\SupplierController@index')->name('supplier');

			Route::get('/create-supplier','Admin\SupplierController@create')->name('create-supplier');
			Route::post('create-supplier','Admin\SupplierController@store')->name('store-supplier');

			Route::get('/supplier/edit/{id}','Admin\SupplierController@edit')->name('edit-supplier');
			Route::post('/supplier/edit/{id}','Admin\SupplierController@update')->name('update-supplier');


			Route::get('/origin','Admin\OriginController@index')->name('origin');

			Route::get('/create-origin','Admin\OriginController@create')->name('create-origin_name');
			Route::post('create-origin','Admin\OriginController@store')->name('store-origin_name');

			Route::get('/origin/edit/{id}','Admin\OriginController@edit')->name('edit-origin_name');
			Route::post('/origin/edit/{id}','Admin\OriginController@update')->name('update-origin_name');


			Route::get('/manufacturer','Admin\ManufacturerController@index')->name('manufacturer');

			Route::get('/create-manufacturer','Admin\ManufacturerController@create')->name('create-manufacturer_name');
			Route::post('create-manufacturer','Admin\ManufacturerController@store')->name('store-manufacturer_name');

			Route::get('/manufacturer/edit/{id}','Admin\ManufacturerController@edit')->name('edit-manufacturer_name');
			Route::post('/manufacturer/edit/{id}','Admin\ManufacturerController@update')->name('update-manufacturer_name');


			Route::get('/customer','Admin\CustomerController@index')->name('customer');

			Route::get('/create-customer','Admin\CustomerController@create')->name('create-customer_name');
			Route::post('create-customer','Admin\CustomerController@store')->name('store-customer_name');

			Route::get('/customer/edit/{id}','Admin\CustomerController@edit')->name('edit-customer_name');
			Route::post('/customer/edit/{id}','Admin\CustomerController@update')->name('update-customer_name');


			Route::get('/product','Admin\ProductController@index')->name('product');

			Route::get('/create-product','Admin\ProductController@create')->name('create-product');
			Route::post('create-product','Admin\ProductController@store')->name('store-product');
			
			Route::get('/product/edit/{id}','Admin\ProductController@edit')->name('edit-product');
			Route::post('/product/edit/{id}','Admin\ProductController@update')->name('update-product');


			//Route account

			Route::get('/create-account','Admin\AccountController@create')->name('create-firstname');
			Route::post('/create-account','Admin\AccountController@store')->name('do-create-account');

			Route::get('/edit-{role}/{id}','Admin\AccountController@edit')->name('edit-admin');
			Route::post('/edit-{role}/{id}','Admin\AccountController@update')->name('update-account');


			Route::get('/account/{role}','Admin\AccountController@show')->name('show-account');
		});
});
});
