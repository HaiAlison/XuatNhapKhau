<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\Paginator;
use App\OrderDetail;
use App\WeightUnit;
use App\Product;
use App\Packing;
use App\Binding;
class OrderDetailController extends Controller
{
    public function index()
    {
    	$orderDetails = OrderDetail::get();
    	return view('admin.purchase-order.purchase-order',compact('orderDetails'));
    }
    public function show($id)
    {
    	$orderDetail = OrderDetail::findOrFail($id);
        $products = Cache::remember('products', 60, function () {
            return Product::all();
        });
        
        $weightUnits = Cache::remember('weightUnits', 60, function () {
            return WeightUnit::all();
        });
        
        $packings = Cache::remember('packings', 60, function () {
            return Packing::all();
        });
        
        $bindings = Cache::remember('bindings', 60, function () {
            return Binding::all();
        });
        return view('admin.purchase-order.order-detail',compact('orderDetail','products','weightUnits','packings','bindings'));

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'net_weight' => 'sometimes|required',
            'price' => 'sometimes|required',
        ],[
            'net_weight.required' => 'The Price field cannot be null',
            'price.required' => 'The ETA field cannot be null',]);
        $orderDetail = OrderDetail::findOrFail($id);
        $input = $request->except('_token');
        $orderDetail->fill($input)->save();
        return redirect()->route('admin.order-detail')->with('success','Edit success!');
    }
}
