<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificateOfOrigin extends Model
{
	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','certificate_of_origin'];
	
}
