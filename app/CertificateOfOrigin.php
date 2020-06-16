<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CertificateOfOrigin extends Model
{
   use SoftDeletes;
   protected $table='certificate_of_origins';
   public $incrementing = false, $keyType = 'string';
}
