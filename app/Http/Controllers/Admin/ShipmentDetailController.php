<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

class ShipmentDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipmentDetails = OrderDetail::get();
    	return view('admin.shipment.shipment',compact('shipmentDetails'));
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
    public function edit($id)
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
