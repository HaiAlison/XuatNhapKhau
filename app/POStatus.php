<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class POStatus extends Model
{
    use SoftDeletes;
    protected $table='po_status';
    public $incrementing = false, $keyType = 'string';
}
