<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
   	protected $table = 'shipment_status';
   	protected $primaryKey = 'id';
	protected $keyType = 'string';
}
