<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = [
		'id','po_no_id','user_id','sale_contract_no','invoice_no','bl_no','bl_date','eta','vessel_name','carrier','shipment_status_id','incoterms_id','pod','type_of_shipment','dem_det','freight_per_container','dthc','cic','freight_per_mt','number_of_bags','gross_weight','co_provider','currency'
	];
	public function shipmentStatus()
	{
		return $this->belongsTo('App\ShipmentStatus');
	}
	public function containerSize()
  	{
  		return $this->belongsTo('App\ContainerSize','container_size');
  	}
}
