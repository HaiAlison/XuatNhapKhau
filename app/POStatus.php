<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class POStatus extends Model
{

    use SoftDeletes;
    protected $table='po_status';
    protected $primaryKey = 'PO_id';

   

}
