<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentStatus extends Model
{
	use SoftDeletes;
   	protected $table = 'shipment_status';
   	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','shipment_status'];
}
