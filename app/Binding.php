<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binding extends Model
{

	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','binding'];
}
