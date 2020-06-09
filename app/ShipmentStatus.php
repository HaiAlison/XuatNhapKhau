<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{

    use SoftDeletes;
   protected $table = 'shipment_status';


}
