<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $primaryKey = 'id';
	protected $keyType = 'string';

	public function shipmentStatus()
	{
		return $this->belongsTo('App\ShipmentStatus');
	}
	public function containerSize()
  	{
  		return $this->belongsTo('App\ContainerSize','container_size');
  	}
}
