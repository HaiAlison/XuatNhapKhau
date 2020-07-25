<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POD extends Model
{
  
    protected $table = 'pods';
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','pod_name'];
}
