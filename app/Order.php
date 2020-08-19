<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'string';


    protected $fillable = [
              'id','po_date','user_id','po_status_id','origin_id','marking','manufacturer_id','supplier_id','pol','pod','incoterm_id','eta_request','end_customer','inspection_required','type_of_shipment','link_to_specs','hs_code','co_id','payment_term_id','within_x_day','currency','number_container',
    ];
    	public function manufacturer()
  	{
  		return $this->belongsTo('App\Manufacturer');
  	}

  	public function paymentTerm()
  	{
  		return $this->belongsTo('App\PaymentTerm');
  	}

  	public function origin()
  	{
  		return $this->belongsTo('App\Origin');
  	}

  	public function supplier()
  	{
  		return $this->belongsTo('App\Supplier');
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
  		return $this->belongsTo('App\POStatus');
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
  		return $this->belongsTo('App\CertificateOfOrigin','co_id');
  	}
  	
    public function pods()
    {
      return $this->belongsTo('App\POD','pod');
    }
    public function pols()
    {
      return $this->belongsTo('App\POD','pol');
    }
    public function user()
    {
      return $this->belongsTo('App\User','user_id');
    }


}
