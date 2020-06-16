<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Manufacturer extends Model
{
    protected $primaryKey = "M_id";
    use SoftDeletes;
}

