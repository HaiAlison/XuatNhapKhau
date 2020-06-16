<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class POD extends Model
{
  
    protected $primaryKey = 'pod_id';
    use SoftDeletes;
    protected $table = 'pods';

}
