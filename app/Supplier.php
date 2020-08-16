<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
	use SoftDeletes;
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','supplier'];

}
