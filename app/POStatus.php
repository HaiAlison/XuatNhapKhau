<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POStatus extends Model
{
    protected $table = 'po_status';
    protected $primaryKey = 'id';
	protected $keyType = 'string';
	protected $fillable = ['id','po_status'];

   
    
}
