<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TypeOfShipmentDetailShipment extends Model
{
	use SoftDeletes;
	protected $primaryKey = 'id';
	protected$keyType ='string';
	protected $fillable = ['id','po_no_id','number_container','container_size','payload'];
	public function containerSize()
	{
		return $this->belongsTo('App\ContainerSize','container_size');
	}
}
