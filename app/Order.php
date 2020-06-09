<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'id';


    protected $fillable = [
              'id','po_date','po_status_id','origin_id','marking','manufacturer_id','supplier_id','pol','pod','incoterm_id','eta_request','end_customer','inspection_required','type_of_shipment','link_to_specs','hs_code','co_id','payment_term_id','within_x_day','currency'
    ];
    	public function manufacturer()
  	{
  		return $this->belongsTo('App\Manufacturer');
  	}

  	public function paymentTerm()
  	{
  		return $this->belongsTo('App\PaymentTerms');
  	}

  	public function origin()
  	{
  		return $this->belongsTo('App\Origin');
  	}

  	public function supplier()
  	{
  		return $this->belongsTo('App\Supplier');
  	}

  	public function typeOfShipment()
  	{
  	  return $this->hasManyThrough('App\TypeOfShipment','App\TypeOfShipmentDetail');
	}

  	public function typeOfShipmentDetail()
  	{
  		return $this->belongsTo('App\TypeOfShipmentDetail');
  	}
  	public function containerSize()
  	{
  		return $this->belongsTo('App\ContainerSize');
  	}
  	public function incoterm()
  	{
  		return $this->belongsTo('App\Incoterm');
  	}
  	public function poStatus()
  	{
  		return $this->belongsTo('App\POStatus','id');
  	}
  	public function orderDetail()
  	{
  		return $this->belongsTo('App\OrderDetail');
  	}
  	public function shipment()
  	{
  		return $this->belongsTo('App\Shipment');
  	}
  	public function certificateOfOrigin()
  	{
  		return $this->belongsTo('App\CertificateOfOrigin');
  	}
  	public function pod()
  	{
  		return $this->belongsTo('App\POD');
  	}

}
