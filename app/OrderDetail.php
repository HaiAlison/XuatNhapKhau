<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $fillable = ['id','product_code_id','weight_unit_id','packing_id','binding_id','net_weight','price','total_amount'];
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    public function packing()
    {
    	return $this->belongsTo('App\Packing');
    }
    public function weightUnit()
    {
    	return $this->belongsTo('App\WeightUnit');
    }
    public function binding()
    {
    	return $this->belongsTo('App\Binding');
    }
}
