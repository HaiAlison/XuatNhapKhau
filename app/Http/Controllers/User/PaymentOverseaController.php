<?php

namespace App\Http\Controllers\User;
use Session;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\excelExport;
use Excel;
use App\Shipment;
use App\ShipmentDetail;
use App\Order;
use App\TypeOfShipmentDetailShipment;
use App\PaymentOversea;
class PaymentOverseaController extends Controller
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
        $shipmentList = Cache::remember('shipment', 60, function () {
            return Shipment::all();
        });
   
    return view('user.payment-oversea',compact('shipmentList'));
    }

    public function create_id($po_no_id, $sub_po_id)
    {
        $shipmentList = Cache::remember('shipment', 60, function () {
            return Shipment::all();
        });
        
        $order= Order::where('id','=',$po_no_id)->first();
        $paymentdetail= ShipmentDetail::where('sub_po_id','=',$sub_po_id)->where('po_no_id','=',$po_no_id)->first();
        $typeofshipment= TypeOfShipmentDetailShipment::where('sub_po_id','=',$sub_po_id)->where('po_no_id','=',$po_no_id)->first();
        //dd($typeofshipment);
        //$shipmentList = Shipment::select('po_no_id', 'sub_po_id')->get();
        $payments= Shipment::where('sub_po_id','=',$sub_po_id)->where('po_no_id','=',$po_no_id)->first();
        return view('user.payment-oversea',compact('shipmentList','payments','paymentdetail','order','typeofshipment'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $po_no_id= $request->po_no_id0;
        $sub_po_id=$request->sub_po_id0;
        if($request->btn_search!=null)
        {
            return redirect()->route('user.create-payment-overseas',['po_no_id'=>$po_no_id,'sub_po_id'=>$sub_po_id]);
        }
        if($request->btn_create!=null)
        {
            $shipmentList = Cache::remember('shipment', 60, function () {
                return Shipment::all();
            });
            //$pament_over=new PaymentOversea();
            $data = $request->all();
            $product = PaymentOversea::create($data);
             //  dd($product);        
            if ($product!=null) 
            {
                Session::flash('success', 'Save successful');
                return redirect()->route('user.payment-overseas');
            }
            else 
            {
                Session::flash('error', 'Error');
                return redirect()->route('user.create-payment-overseas',['po_no_id'=>$po_no_id,'sub_po_id'=>$sub_po_id]);
            }
        }
       
       
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
    public function export(Request $request)
    {
        
        
            return Excel::download(new excelExport($request), 'excel.xlsx');
        
    }
}