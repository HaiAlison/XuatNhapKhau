<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightUnit extends Model
{
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','weight_unit'];

}
