<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfShipmentDetail extends Model
{
    protected $fillable = [
    			'id','number_container','container_size_id','payload','freight_target','dthc_target','cic_target',
    ];
    protected $primaryKey = 'id';
	protected $keyType = 'string';
}
