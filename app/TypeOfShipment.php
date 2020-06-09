<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TypeOfShipment extends Model
{
    use SoftDeletes;
    protected $table ='type_of_shipments';
    public $incrementing = false, $keyType = 'string';
}
