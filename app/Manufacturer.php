<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $primaryKey = 'id';
    protected $keyType = 'string';
	protected $fillable = ['id','manufacturer_name','manufacturer_address'];

}