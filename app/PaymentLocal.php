<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLocal extends Model
{
    protected $primaryKey = 'id';
	protected $fillable = ['id','po_no_id','sub_po_no_id','po_date','type_of_service','tax_level','item_name','item_origin', 'qty', 'unit_price', 'incoterms_id', 'freight', 'pol', 'ship', 'cont', 'docs', 'dthc', 'cic', 'cleaning', 'other', 'bl_date', 'eta','amount', 'due_date', 'week', 'pr_no', 'pr_date'];


}
