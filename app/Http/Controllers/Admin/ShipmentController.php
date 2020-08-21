<?php

namespace App\Http\Controllers\Admin;

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
        $shipments = Shipment::orderBy('bl_date')->get();
        return view('admin.shipment.shipment',compact('shipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($po_no_id, $id)
    {
        $containerSizesList = Cache::remember('container_sizes', 60, function () {
            return ContainerSize::all();
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
        $typeofshipment= TypeOfShipmentDetailShipment::where('id','=',$id)->where('po_no_id','=',$po_no_id)->first();
        $shipments= Shipment::where('id','=',$id)->where('po_no_id','=',$po_no_id)->first();
        return view('admin.shipment.show-shipment',compact('shipments','typeofshipment','shipmentStatus','podList','incotermList','containerSizesList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($po_no_id, $id)
    {
        $containerSizesList = Cache::remember('container_sizes', 60, function () {
            return ContainerSize::all();
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
        $typeofshipment= TypeOfShipmentDetailShipment::where('sub_po_no_id','=',$id)->where('po_no_id','=',$po_no_id)->first();
        $shipments= Shipment::where('id','=',$id)->where('po_no_id','=',$po_no_id)->first();
        return view('admin.shipment.edit-shipment',compact('shipments','typeofshipment','shipmentStatus','podList','incotermList','containerSizesList'));
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
