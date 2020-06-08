<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContainerSize extends Model
{
    use SoftDeletes;
    protected $table ='container_sizes';
    public $incrementing = false, $keyType = 'string';
}
