<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Origin extends Model
{
    use SoftDeletes;
    protected $table='origins';
    public $incrementing = false, $keyType = 'string';
}
