<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = ['id','product_code_id','product_name_id','weight_unit_id','packing_id','binding_id','net_weight_id','price','total_amount'];
}
