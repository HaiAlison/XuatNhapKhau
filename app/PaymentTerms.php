<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentTerms extends Model
{
    use SoftDeletes;
    protected $table = 'payment_terms';
    public $incrementing = false, $keyType = 'string';
}
