<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
  	protected $primaryKey = 'id';
    protected $keyType = 'string';
	protected $fillable = ['id','origin_name'];

}
