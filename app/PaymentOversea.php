<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentOversea extends Model
{
  protected $fillable = [
    'po_no_id','sub_po_no_id','user_id','po_date','item_name','item_packing','item_source','item_origin','qty','unit_price','incoterms','payment_term','invoicing_party','pol','ship','cont','freight','bl_date','eta','total_amount','due_date','week','pr_no','pr_date','total_payment','first_payment_date','first_payment_amount','second_payment_date','second_payment_amount','third_payment_date','third_payment_amount','fourth_payment_date','fourth_payment_amount','fifth_payment_date','fifth_payment_amount'
  ];
  public function pols()
    {
      return $this->belongsTo('App\POD','pol');
    }
    public function incoterm()
    {
      return $this->belongsTo('App\Incoterm','incoterms');
    }
    public function origin()
    {
      return $this->belongsTo('App\Origin','item_origin');
    }
    public function packing()
    {
      return $this->belongsTo('App\Packing','item_packing');
    }
    public function manufacturer()
    {
      return $this->belongsTo('App\Manufacturer','item_source');
    }
}
