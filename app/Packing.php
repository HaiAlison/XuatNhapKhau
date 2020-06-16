<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Packing extends Model
{
    use SoftDeletes;
    protected $table='packings';
    public $incrementing = false, $keyType = 'string';

}
