<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLocal extends Model
{
	use SoftDeletes;
	protected $primaryKey = 'id';
	protected $fillable = ['po_no_id','user_id','sub_po_no_id','po_date','type_of_service','tax_level','item_name','item_origin', 'qty', 'unit_price', 'incoterms_id', 'freight', 'pol', 'ship', 'cont', 'docs', 'dthc', 'cic', 'cleaning', 'other', 'bl_date', 'eta','amount', 'due_date', 'week', 'pr_no', 'pr_date'];

	public function pols()
	{
		return $this->belongsTo('App\POD','pol');
	}
	public function incoterm()
	{
		return $this->belongsTo('App\Incoterm','incoterms_id');
	}
	public function origin()
	{
		return $this->belongsTo('App\Origin','item_origin');
	}
	public function product()
	{
		return $this->belongsTo('App\Product','item_name');
	}
}
