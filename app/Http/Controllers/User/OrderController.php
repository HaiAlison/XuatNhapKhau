<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\POStatus;
use App\Origin;
use App\Manufacturer;
use App\Order;
use App\Supplier;
use App\POD;
use App\Incoterm;
use App\ContainerSize;
use App\CertificateOfOrigin;
use App\PaymentTerm;
use App\TypeOfShipmentDetail;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poStatuses = POStatus::all();
        $origins = Origin::all();
        $manufacturers = Manufacturer::all();
        $suppliers = Supplier::all();
        $pods = POD::all();
        $incoterms = Incoterm::all();
        $containerSizes = ContainerSize::all();
        $cos = CertificateOfOrigin::all();
        $paymentTerms = PaymentTerm::all();

        return view('user.order',compact('poStatuses','origins','manufacturers','suppliers','pods','incoterms','containerSizes','cos','paymentTerms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id' => 'required|unique:orders',
            'end_customer' => 'required',

        ]);

        if($request->type_of_shipment === 'vessle'){

            Order::create($request->except('_token'));
        }
        else{
            Order::create($request->except('_token'));

            TypeOfShipmentDetail::create($request->except('_token'));
        }
           

         return redirect()->route('user.order-detail')->with('success','Save successful');
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
