<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerm extends Model
{
	use SoftDeletes;
   	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','payment_terms'];
}
