<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  	protected $primaryKey = 'p_id';
    use SoftDeletes;


}
