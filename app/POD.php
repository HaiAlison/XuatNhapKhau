<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class POD extends Model
{
	use SoftDeletes;
	protected $table = 'pods';
	protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','pod_name'];
}
