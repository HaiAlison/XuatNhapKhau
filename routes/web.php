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

			// Route::get('/payment-overseas','User\PaymentOverseaController@create')->name('payment-overseas');
			// Route::post('/show-payment-overseas','User\PaymentOverseaController@show')->name('show-payment-overseas');
			// Route::get('/export','User\PaymentOverseaContrller@export')->name('export');
			// Route::get('/create-payment-overseas/{po_no_id}/{sub_po_id}','User\PaymentOverseaController@create_id')->name('create-payment-overseas');

			
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

Route::middleware('admin')->group(function(){

	
	Route::prefix('admin')->group(function(){
		Route::name('admin.')->group(function(){

			Route::get('/','Auth\AdminLoginController@index')->name('index');
			Route::get('/logout','Auth\AdminLoginController@logout')->name('logout');

			Route::get('/binding','Admin\BindingController@index')->name('binding');

			Route::get('/create-binding','Admin\BindingController@create')->name('create-binding');
			Route::post('create-binding','Admin\BindingController@store')->name('store-binding');


			Route::get('/binding/edit/{id}','Admin\BindingController@edit')->name('edit-binding');
			Route::post('/binding/edit/{id}','Admin\BindingController@update')->name('update-binding');
			Route::get('binding/delete/{id}','Admin\BindingController@destroy')->name('delete-binding');

			Route::get('binding/restore','Admin\BindingController@trash')->name('trash-binding');
			Route::get('binding/restore/{id}','Admin\BindingController@restore')->name('restore-binding');
			Route::get('binding/force/{id}','Admin\BindingController@force')->name('force-binding');


			Route::get('/tables','Admin\TablesController@index')->name('tables');


			Route::get('/shipment-status','Admin\ShipmentStatusController@index')->name('shipment-status');

			Route::get('/create-shipment-status','Admin\ShipmentStatusController@create')->name('create-shipment_status');
			Route::post('create-shipment-status','Admin\ShipmentStatusController@store')->name('store-shipment_status');

			Route::get('/shipment-status/edit/{id}','Admin\ShipmentStatusController@edit')->name('edit-shipment_status');
			Route::post('/shipment-status/edit/{id}','Admin\ShipmentStatusController@update')->name('update-shipment_status');
			Route::get('shipment-status/delete/{id}','Admin\ShipmentStatusController@destroy')->name('delete-shipment_status');

			Route::get('shipment-status/restore','Admin\ShipmentStatusController@trash')->name('trash-shipment_status');
			Route::get('shipment-status/restore/{id}','Admin\ShipmentStatusController@restore')->name('restore-shipment_status');
			Route::get('shipment-status/force/{id}','Admin\ShipmentStatusController@force')->name('force-shipment_status');

			Route::get('/payment-terms','Admin\PaymentTermController@index')->name('payment-terms');

			Route::get('/create-payment-terms','Admin\PaymentTermController@create')->name('create-payment_terms');
			Route::post('create-payment-terms','Admin\PaymentTermController@store')->name('store-payment_terms');

			Route::get('/payment-terms/edit/{id}','Admin\PaymentTermController@edit')->name('edit-payment_terms');
			Route::post('/payment-terms/edit/{id}','Admin\PaymentTermController@update')->name('update-payment_terms');
			Route::get('payment-terms/delete/{id}','Admin\PaymentTermController@destroy')->name('delete-payment_terms');

			Route::get('payment-terms/restore','Admin\PaymentTermController@trash')->name('trash-payment_terms');
			Route::get('payment-terms/restore/{id}','Admin\PaymentTermController@restore')->name('restore-payment_terms');
			Route::get('payment-terms/force/{id}','Admin\PaymentTermController@force')->name('force-payment_terms');

			Route::get('/incoterms','Admin\IncotermController@index')->name('incoterms');

			Route::get('/create-incoterms','Admin\IncotermController@create')->name('create-incoterms');
			Route::post('create-incoterms','Admin\IncotermController@store')->name('store-incoterms');

			Route::get('/incoterms/edit/{id}','Admin\IncotermController@edit')->name('edit-incoterms');
			Route::post('/incoterms/edit/{id}','Admin\IncotermController@update')->name('update-incoterms');
			Route::get('incoterms/delete/{id}','Admin\IncotermController@destroy')->name('delete-incoterms');

			Route::get('incoterms/restore','Admin\IncotermController@trash')->name('trash-incoterms');
			Route::get('incoterms/restore/{id}','Admin\IncotermController@restore')->name('restore-incoterms');
			Route::get('incoterms/force/{id}','Admin\IncotermController@force')->name('force-incoterms');

			Route::get('/packing','Admin\PackingController@index')->name('packing');

			Route::get('/create-packing','Admin\PackingController@create')->name('create-packing');
			Route::post('create-packing','Admin\PackingController@store')->name('store-packing');

			Route::get('/packing/edit/{id}','Admin\PackingController@edit')->name('edit-packing');
			Route::post('/packing/edit/{id}','Admin\PackingController@update')->name('update-packing');
			Route::get('packing/delete/{id}','Admin\PackingController@destroy')->name('delete-packing');

			Route::get('packing/restore','Admin\PackingController@trash')->name('trash-packing');
			Route::get('packing/restore/{id}','Admin\PackingController@restore')->name('restore-packing');
			Route::get('packing/force/{id}','Admin\PackingController@force')->name('force-packing');

			Route::get('/container-size','Admin\ContainerSizeController@index')->name('container-size');	

			Route::get('/create-container-size','Admin\ContainerSizeController@create')->name('create-container_size');
			Route::post('create-container-size','Admin\ContainerSizeController@store')->name('store-container_size');

			Route::get('/container-size/edit/{id}','Admin\ContainerSizeController@edit')->name('edit-container_size');
			Route::post('/container-size/edit/{id}','Admin\ContainerSizeController@update')->name('update-container_size');
			Route::get('container-size/delete/{id}','Admin\ContainerSizeController@destroy')->name('delete-container_size');

			Route::get('container-size/restore','Admin\ContainerSizeController@trash')->name('trash-container_size');
			Route::get('container-size/restore/{id}','Admin\ContainerSizeController@restore')->name('restore-container_size');
			Route::get('container-size/force/{id}','Admin\ContainerSizeController@force')->name('force-container_size');

			Route::get('/certificate-of-origin','Admin\CertificateOfOriginController@index')->name('certificate-of-origin');

			Route::get('/create-certificate-of-origin','Admin\CertificateOfOriginController@create')->name('create-certificate_of_origin');
			Route::post('create-certificate-of-origin','Admin\CertificateOfOriginController@store')->name('store-certificate_of_origin');

			Route::get('/certificate-of-origin/edit/{id}','Admin\CertificateOfOriginController@edit')->name('edit-certificate_of_origin');
			Route::post('/certificate-of-origin/edit/{id}','Admin\CertificateOfOriginController@update')->name('update-certificate_of_origin');
			Route::get('certificate-of-origin/delete/{id}','Admin\CertificateOfOriginController@destroy')->name('delete-certificate_of_origin');

			Route::get('certificate-of-origin/restore','Admin\CertificateOfOriginController@trash')->name('trash-certificate_of_origin');
			Route::get('certificate-of-origin/restore/{id}','Admin\CertificateOfOriginController@restore')->name('restore-certificate_of_origin');
			Route::get('certificate-of-origin/force/{id}','Admin\CertificateOfOriginController@force')->name('force-certificate_of_origin');

			Route::get('/po-status','Admin\PoStatusController@index')->name('po-status');	

			Route::get('/create-po-status','Admin\PoStatusController@create')->name('create-po_status');
			Route::post('create-po-status','Admin\PoStatusController@store')->name('store-po_status');

			Route::get('/po-status/edit/{id}','Admin\PoStatusController@edit')->name('edit-po_status');
			Route::post('/po-status/edit/{id}','Admin\PoStatusController@update')->name('update-po_status');
			Route::get('po-status/delete/{id}','Admin\PoStatusController@destroy')->name('delete-po_status');

			Route::get('po-status/restore','Admin\PoStatusController@trash')->name('trash-po_status');
			Route::get('po-status/restore/{id}','Admin\PoStatusController@restore')->name('restore-po_status');
			Route::get('po-status/force/{id}','Admin\PoStatusController@force')->name('force-po_status');

			Route::get('/weight-unit','Admin\WeightUnitController@index')->name('weight-unit');	

			Route::get('/create-weight-unit','Admin\WeightUnitController@create')->name('create-weight_unit');
			Route::post('create-weight-unit','Admin\WeightUnitController@store')->name('store-weight_unit');

			Route::get('weight-unit/edit/{id}','Admin\WeightUnitController@edit')->name('edit-weight_unit');
			Route::post('/weight-unit/edit/{id}','Admin\WeightUnitController@update')->name('update-weight_unit');
			Route::get('weight-unit/delete/{id}','Admin\WeightUnitController@destroy')->name('delete-weight_unit');

			Route::get('weight-unit/restore','Admin\WeightUnitController@trash')->name('trash-weight_unit');
			Route::get('weight-unit/restore/{id}','Admin\WeightUnitController@restore')->name('restore-weight_unit');
			Route::get('weight-unit/force/{id}','Admin\WeightUnitController@force')->name('force-weight_unit');

			Route::get('/pod','Admin\PodController@index')->name('pod');	

			Route::get('/create-pod','Admin\PodController@create')->name('create-pod_name');
			Route::post('create-pod','Admin\PodController@store')->name('store-pod_name');

			Route::get('/pod/edit/{id}','Admin\PodController@edit')->name('edit-pod_name');
			Route::post('/pod/edit/{id}','Admin\PodController@update')->name('update-pod_name');
			Route::get('pod/delete/{id}','Admin\PodController@destroy')->name('delete-pod_name');

			Route::get('pod/restore','Admin\PodController@trash')->name('trash-pod_name');
			Route::get('pod/restore/{id}','Admin\PodController@restore')->name('restore-pod_name');
			Route::get('pod/force/{id}','Admin\PodController@force')->name('force-pod_name');

			Route::get('/supplier','Admin\SupplierController@index')->name('supplier');

			Route::get('/create-supplier','Admin\SupplierController@create')->name('create-supplier');
			Route::post('create-supplier','Admin\SupplierController@store')->name('store-supplier');

			Route::get('/supplier/edit/{id}','Admin\SupplierController@edit')->name('edit-supplier');
			Route::post('/supplier/edit/{id}','Admin\SupplierController@update')->name('update-supplier');
			Route::get('supplier/delete/{id}','Admin\SupplierController@destroy')->name('delete-supplier');

			Route::get('supplier/restore','Admin\SupplierController@trash')->name('trash-supplier');
			Route::get('supplier/restore/{id}','Admin\SupplierController@restore')->name('restore-supplier');
			Route::get('supplier/force/{id}','Admin\SupplierController@force')->name('force-supplier');

			Route::get('/origin','Admin\OriginController@index')->name('origin');

			Route::get('/create-origin','Admin\OriginController@create')->name('create-origin_name');
			Route::post('create-origin','Admin\OriginController@store')->name('store-origin_name');

			Route::get('/origin/edit/{id}','Admin\OriginController@edit')->name('edit-origin_name');
			Route::post('/origin/edit/{id}','Admin\OriginController@update')->name('update-origin_name');
			Route::get('origin/delete/{id}','Admin\OriginController@destroy')->name('delete-origin_name');

			Route::get('origin/restore','Admin\BindingController@trash')->name('trash-origin_name');
			Route::get('origin/restore/{id}','Admin\BindingController@restore')->name('restore-origin_name');
			Route::get('origin/force/{id}','Admin\BindingController@force')->name('force-origin_name');

			Route::get('/manufacturer','Admin\ManufacturerController@index')->name('manufacturer');

			Route::get('/create-manufacturer','Admin\ManufacturerController@create')->name('create-manufacturer_name');
			Route::post('create-manufacturer','Admin\ManufacturerController@store')->name('store-manufacturer_name');

			Route::get('/manufacturer/edit/{id}','Admin\ManufacturerController@edit')->name('edit-manufacturer_name');
			Route::post('/manufacturer/edit/{id}','Admin\ManufacturerController@update')->name('update-manufacturer_name');
			Route::get('manufacturer/delete/{id}','Admin\ManufacturerController@destroy')->name('delete-manufacturer_name');

			Route::get('manufacturer/restore','Admin\ManufacturerController@trash')->name('trash-manufacturer_name');
			Route::get('manufacturer/restore/{id}','Admin\ManufacturerController@restore')->name('restore-manufacturer_name');
			Route::get('manufacturer/force/{id}','Admin\ManufacturerController@force')->name('force-manufacturer_name');

			Route::get('/customer','Admin\CustomerController@index')->name('customer');

			Route::get('/create-customer','Admin\CustomerController@create')->name('create-customer_name');
			Route::post('create-customer','Admin\CustomerController@store')->name('store-customer_name');

			Route::get('/customer/edit/{id}','Admin\CustomerController@edit')->name('edit-customer_name');
			Route::post('/customer/edit/{id}','Admin\CustomerController@update')->name('update-customer_name');
			Route::get('customer/delete/{id}','Admin\CustomerController@destroy')->name('delete-customer_name');

			Route::get('customer/restore','Admin\CustomerController@trash')->name('trash-customer_name');
			Route::get('customer/restore/{id}','Admin\CustomerController@restore')->name('restore-customer_name');
			Route::get('customer/force/{id}','Admin\CustomerController@force')->name('force-customer_name');

			Route::get('/product','Admin\ProductController@index')->name('product');

			Route::get('/create-product','Admin\ProductController@create')->name('create-product');
			Route::post('create-product','Admin\ProductController@store')->name('store-product');
			
			Route::get('/product/edit/{id}','Admin\ProductController@edit')->name('edit-product');
			Route::post('/product/edit/{id}','Admin\ProductController@update')->name('update-product');
			Route::get('product/delete/{id}','Admin\ProductController@destroy')->name('delete-product');

			Route::get('product/restore','Admin\ProductController@trash')->name('trash-product');
			Route::get('product/restore/{id}','Admin\ProductController@restore')->name('restore-product');
			Route::get('product/force/{id}','Admin\ProductController@force')->name('force-product');

			//Route account

			Route::get('/create-account','Admin\AccountController@create')->name('create-firstname');
			Route::post('/create-account','Admin\AccountController@store')->name('do-create-account');
			Route::get('account/delete/{id}','Admin\AccountController@destroy')->name('delete-firstname');

			Route::get('account/restore/{role}','Admin\AccountController@trash')->name('trash-firstname');
			Route::get('account/restore/{role}/{id}','Admin\AccountController@restore')->name('restore-firstname');
			Route::get('account/force/{id}','Admin\AccountController@force')->name('force-firstname');

			Route::get('/edit-{role}/{id}','Admin\AccountController@edit')->name('edit-admin');
			Route::post('/edit-{role}/{id}','Admin\AccountController@update')->name('update-account');


			Route::get('/account/{role}','Admin\AccountController@show')->name('show-account');



			Route::get('order','Admin\PurchaseOrderController@index')->name('order');
			Route::get('show-order/{id}','Admin\PurchaseOrderController@show')->name('show-order');
			Route::get('editt-order/{id}','Admin\PurchaseOrderController@edit')->name('edit-order');
			Route::post('editt-order/{id}','Admin\PurchaseOrderController@update')->name('update-order');

			Route::get('order-detail','Admin\OrderDetailController@index')->name('order-detail');
		});
});
});
