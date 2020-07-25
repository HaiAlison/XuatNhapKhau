<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','customer_name'];

}
