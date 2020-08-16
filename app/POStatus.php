<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class POStatus extends Model
{
	use SoftDeletes;
    protected $table = 'po_status';
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','po_status'];

   
    
}
