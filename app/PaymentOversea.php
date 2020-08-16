<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentOversea extends Model
{
  use SoftDeletes;
    protected $primaryKey = 'id';
	protected $keyType = 'string';
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
}
