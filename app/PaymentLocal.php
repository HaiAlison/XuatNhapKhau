<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLocal extends Model
{
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id'];

}
