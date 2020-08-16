<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
	use SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
	protected $fillable = ['id','manufacturer_name','manufacturer_address'];

}