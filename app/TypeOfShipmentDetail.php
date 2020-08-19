<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfShipmentDetail extends Model
{
	use SoftDeletes;
    protected $fillable = [
    			'number_container','container_size_id','payload','freight_target','dthc_target','cic_target','id',
    ];
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	public function containerSize()
	{
  		return $this->belongsTo('App\ContainerSize');
	}
}
