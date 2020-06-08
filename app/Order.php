<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
 	protected $table='orders';
    //
    	public function manufacturers()
  	{
  		$this->hasMany('App\Manufacturer');
  	}

  	public function paymentTerms()
  	{
  		$this->hasMany('App\PaymentTerms');
  	}

  	public function origins()
  	{
  		$this->hasMany('App\Origin');
  	}

  	public function suppliers()
  	{
  		$this->hasMany('App\Supplier');
  	}

  	public function typeOfShipments()
  	{
  	   	return $this->hasManyThrough('App\TypeOfShipment','App\TypeOfShipmentDetail');
	}

  	public function typeOfShipmentDetails()
  	{
  		$this->hasMany('App\TypeOfShipmentDetail');
  	}
  	public function containerSizes()
  	{
  		$this->hasMany('App\ContainerSize');
  	}
  	public function incoterms()
  	{
  		$this->hasMany('App\Incoterm');
  	}
  	public function poStatus()
  	{
  		$this->hasMany('App\POStatus');
  	}
  	public function orderDetails()
  	{
  		$this->belongsTo('App\OrderDetail');
  	}
  	public function shipments()
  	{
  		$this->belongsTo('App\Shipment');
  	}
  	public function certificateOfOrigins()
  	{
  		$this->hasMany('App\CertificateOfOrigin');
  	}
  	public function pods()
  	{
  		$this->hasMany('App\POD');
  	}

}
