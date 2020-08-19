<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\OrderDetail;
class OrderDetailController extends Controller
{
    public function index()
    {
    	$orderDetails = OrderDetail::simplePaginate(9);
    	return view('admin.purchase-order.purchase-order',compact('orderDetails'));
    }
}
