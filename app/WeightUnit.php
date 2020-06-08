<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeightUnit extends Model
{
    use SoftDeletes;
    protected $table = 'weight_units';
    public $incrementing = false, $keyType = 'string';
}
