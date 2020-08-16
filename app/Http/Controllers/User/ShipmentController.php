<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


use App\Order;
use App\Custome;
use App\CertificateOfOrigin;
use App\Binding;
use App\Incoterm;
use App\Manufacturer;
use App\Origin;
use App\Packing;
use App\PaymentLocal;
use App\PaymentOversea;
use App\Product;
use App\TypeOfShipmentDetail;
use App\ContainerSize;
use App\OrderDetail;
use App\Shipment;
use App\POD;
use App\TypeOfShipmentDetailShipment;
use App\ShipmentDetail;
use App\ShipmentStatus;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = Shipment::all();
        $title = 'Shipment';
        $name= 'shipment';
        $another = '';
        return view('admin.shipment',compact('title','nameToForeach','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_id($id)
    {   
        $containerSizesList = Cache::remember('container_sizes', 60, function () {
            return ContainerSize::all();
        });
        $orderList = Cache::remember('orders', 60, function () {
            return Order::all();
        });
         $incotermList = Cache::remember('incoterms', 60, function () {
            return Incoterm::all();
        });
          $podList = Cache::remember('pods', 60, function () {
            return POD::all();
        });
        $shipmentStatus = Cache::remember('shipmentStatus',60,function(){
            return ShipmentStatus::all();
        });
        $order = Order::find($id);
        $productList= OrderDetail::where('po_no_id','=',$id)->get();
        if($order->type_of_shipment === 'container')
        {
            $type= TypeOfShipmentDetail::find($id);
           // $size = ContainerSize::find($type->container_size_id);
            return view('user.shipment', compact('order','type','orderList','productList','podList','containerSizesList', 'incotermList','shipmentStatus'));
        } 
        else
            return view('user.shipment', compact('order','orderList','productList','podList', 'incotermList','shipmentStatus')); 

        
    }
    public function create()
    {
        $incotermList = Cache::remember('incoterms', 60, function () {
            return Incoterm::all();
        });
         $orderList = Cache::remember('orders', 60, function () {
            return Order::all();
        }); 

        return view('user.shipment', compact('orderList')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //shipment
        if($request->type_of_shipment === 'vessle'){

            Shipment::create($request->except('_token'));

        }
        else{ 
            Shipment::create($request->except('_token'));
           
            TypeOfShipmentDetailShipment::create($request->except('_token'));
        }
        $shipment = Shipment::where([['id','=',$request->id],['po_no_id','=',$request->po_no_id]])->first();
        $shipment->save();
        //shipment-detail
        $po_no_id= $request->po_no_id;
        $sub_po_id=$request->id;
        $shipmentDetailCol = collect ($request->product_code_id);
        $shipmentDetailFilter=$shipmentDetailCol->filter(function ($value, $key) {
            return $value != null;
                });
        $request->merge(['product_code_id'=>$shipmentDetailFilter->all()]);
        $nonOrder = $request->product_code_id;
        $reOrder = array_merge($nonOrder);
        $request->merge(['product_code_id'=>$reOrder]);
        foreach ($request->product_code_id as $key => $value) {
            $data = array(
                      'po_no_id' =>$po_no_id,
                      'sub_po_no_id'=> $sub_po_id,
                      'product_code_id'=>$request->product_code_id[$key],
                      'packing_id'=>$request->packing_id[$key],
                      'weight_unit_id'=>$request->weight_unit_id[$key],
                      'binding_id'=>$request->binding_id[$key],
                      'net_weight'=>$request->net_weight_id[$key],
                      'price'=>$request->price[$key],
                      'total_amount'=>$request->total_amount[$key]
                    );
                      ShipmentDetail::insert($data); 
                      return redirect()->route('user.index')->with('success','Shipment successfully created');
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($po_no_id, $sub_po_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
