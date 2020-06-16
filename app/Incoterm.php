<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incoterm extends Model
{

   protected $primaryKey = 'incoterm_id';

   use SoftDeletes;

}
