<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Manufacturer extends Model
{
    use SoftDeletes;
    protected $table='manufacturers';
    public $incrementing = false, $keyType = 'string';
}