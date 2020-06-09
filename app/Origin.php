<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Origin extends Model
{


  	protected $primaryKey = "O_id";
    use SoftDeletes;

}
