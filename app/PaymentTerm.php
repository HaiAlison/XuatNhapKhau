<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
   	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','payment_terms'];
}
