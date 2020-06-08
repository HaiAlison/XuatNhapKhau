<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incoterm extends Model
{
   use SoftDeletes;
   protected $table ='incoterms';
   public $incrementing = false, $keyType = 'string';
}
