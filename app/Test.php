<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	public $timestamps = false;
	protected $fillable = [
        'a', 'b', 'c',
    ];
   
   	public function manufacturers()
  	{
  		return $this->hasMany('App\Manufacturer');
  	}

  	public function paymentTerms()
  	{
  		return $this->hasMany('App\PaymentTerms');
  	}

  	public function origins()
  	{
  		return $this->hasMany('App\Origin');
  	}

  	public function suppliers()
  	{
  		return $this->hasMany('App\Supplier');
  	}

  	public function typeOfShipmentDetails()
  	{
  		return $this->hasMany('App\TypeOfShipmentDetail');
  	}
  	public function containerSizes()
  	{
  		return $this->hasMany('App\ContainerSize');
  	}
  	public function incoterms()
  	{
  		return $this->hasMany('App\Incoterm');
  	}
  	public function poStatuss()
  	{
  		return $this->hasMany('App\POStatus','id');
  	}
  	public function orderDetails()
  	{
  		return $this->hasMany('App\OrderDetail');
  	}
  	public function shipments()
  	{
  		return $this->hasMany('App\Shipment');
  	}
  	public function certificateOfOrigins()
  	{
  		return $this->hasMany('App\CertificateOfOrigin');
  	}
  	
    public function pods()
    {
      return $this->hasMany('App\POD','pod');
    }
    public function pols()
    {
      return $this->hasMany('App\POD','pol');
    }

}
