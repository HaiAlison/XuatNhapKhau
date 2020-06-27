<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContainerSize extends Model
{
	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','container_size'];

}
