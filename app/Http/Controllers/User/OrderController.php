<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        //save file specs
            $date = date('jnyH_i_s'); //1/1/99_23:03:213
            $path="";
            if($request->has('link_to_specs'))
                {
                    $fileName = $request->file('link_to_specs')->getClientOriginalName();
                    $path =  $request->file('link_to_specs')->storeAs('public/upload',$date.$fileName);
                }
            $order = Order::find($request->id);
            $order->link_to_specs = $path;
            $order->save();
        
       
        //save order-detail
        $id = $request->id;
        foreach ($request->product_code_id as $key => $value) {
                if($request->product_code_id[$key] != null){//nếu id null thì bỏ k lưu
                    //nếu id null thì k cho nhập gì.
                 $data = array(
                                'id' =>$id,
                                'product_code_id'=>$request->product_code_id[$key],
                                'weight_unit_id'=>$request->weight_unit_id[$key],
                                'packing_id'=>$request->packing_id[$key],
                                'binding_id'=>$request->binding_id[$key],
                                'net_weight_id'=>$request->net_weight_id[$key],
                                'price'=>$request->price[$key],
                                'total_amount'=>$request->total_amount[$key]);
                                OrderDetail::insert($data);
                }
            }

            $request->session()->put('data-order',$request->except('link_to_specs'));

            //return $request->session()->pull('data-order');

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
