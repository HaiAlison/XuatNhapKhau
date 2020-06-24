<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentTerm;
class PaymentTermController extends Controller
{
    public function index()
    {
        $nameToForeach = PaymentTerm::all();
        $title = 'Payment Terms';
        $name= 'payment_terms';
        $another = '';
        return view('admin.show',compact('title','nameToForeach','name','another'));
    }

}
