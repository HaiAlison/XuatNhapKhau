<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Binding extends Model
{
    use SoftDeletes;
    protected $table="bindings";
    public $incrementing = false, $keyType = 'string';
}
