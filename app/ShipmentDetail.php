<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentDetail extends Model
{
	protected $fillable = [
		'po_no_id','sub_po_no_id','product_code_id','packing_id','weight_unit_id','binding_id','net_weight','price','total_amount'
	];
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
