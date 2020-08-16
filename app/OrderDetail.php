<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    //
    protected $fillable = ['product_code_id','weight_unit_id','packing_id','binding_id','net_weight','price','total_amount'];
    public function product()
    {
        return $this->belongsTo('App\Product','product_code_id');
    }
    public function packing()
    {
        return $this->belongsTo('App\Packing','packing_id');
    }
    public function binding()
    {
        return $this->belongsTo('App\Binding','binding_id');
    }
    public function weightUnit()
    {
        return $this->belongsTo('App\WeightUnit','weight_unit_id'); 
    }
}
