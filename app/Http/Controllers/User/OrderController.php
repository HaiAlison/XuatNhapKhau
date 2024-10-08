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
use App\Product;
use App\WeightUnit, App\Packing, App\Binding, App\OrderDetail;

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
    public function create( Request $request)
    {
        $poStatuses = Cache::remember('po-status', 60, function () {
            return POStatus::all();
        });
        $origins = Cache::remember('origin', 60, function () {
            return Origin::all();
        });
        $manufacturers = Cache::remember('manufacturers', 60, function () {
            return Manufacturer::all();
        });
        $suppliers = Cache::remember('suppliers', 60, function () {
            return Supplier::all();
        });
        $pods = Cache::remember('pods', 60, function () {
            return POD::all();
        });
        $incoterms = Cache::remember('incoterms', 60, function () {
            return Incoterm::all();
        });
        $containerSizes = Cache::remember('containerSizes', 60, function () {
            return ContainerSize::all();
        });
        $cos = Cache::remember('cos', 60, function () {
            return CertificateOfOrigin::all();
        });
        $paymentTerms = Cache::remember('paymentTerms', 60, function () {
            return PaymentTerm::all();
        });
        
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
        return view('user.order',compact('poStatuses','origins','manufacturers','suppliers','pods','incoterms','containerSizes','cos','paymentTerms','products','weightUnits','packings','bindings'));
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
            'po_date' => 'required',
            'hs_code' => 'required',
            'number_container' => 'sometimes|required',
            'payload' => 'sometimes|required',
            'freight_target' => 'sometimes|required',
            'cic_target' => 'sometimes|required',
            'dthc_target' => 'sometimes|required',
            'within_x_day' => 'required',
            'currency' => 'required',
            'marking' => 'required',
            'net_weight[]' => 'sometimes|required',
            'price[]' => 'sometimes|required',
            'eta_request' => 'required',
        ],
        [ 'id.required' => 'The PO No. field cannot be null',
          'id.unique' => 'The PO No. has already been taken.',
            'end_customer.required' => 'The End Customer field cannot be null',
            'po_date.required' => 'The PO Date field cannot be null',
            'hs_code.required' => 'The HS Code field cannot be null',
            'number_container.required' => 'The Number Container field cannot be null',
            'payload.required' => 'The Payload field cannot be null',
            'freight_target.required' => 'The Freight field cannot be null',
            'cic_target.required' => 'The CIC Target field cannot be null',
            'dthc_target.required' => 'The DTHC field cannot be null',
            'within_x_day.required' => 'The Within # day field cannot be null',
            'currency.required' => 'The Currency field cannot be null',
            'net_weight.required' => 'The Net Weight field cannot be null',
            'marking.required' => 'The Marking field cannot be null',
            'net_weight[].required' => 'The Price field cannot be null',
            'price[].required' => 'The ETA field cannot be null',


        ]);
        if($request->type_of_shipment == 'vessel'){

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
                    $file= $request->file('link_to_specs');
                    $fileName = $request->file('link_to_specs')->getClientOriginalName();
                    $path =  $request->file('link_to_specs')->storeAs('public/upload',$date.$fileName);
                }
            $order = Order::find($request->id);
            $order->link_to_specs = $path;
            $order->save();
        
       
        //save order-detail
        $id = $request->id;
        $req = collect ($request->product_code_id);
        $filtered = $req->filter(function ($value, $key) { //cái này là code cũ. vì hồi đó cứ ấn tab là thêm dòng, cho nên phải filter
            return $value != null;
                });
        $request->merge(['product_code_id' => $filtered->all()]);
        $nonOrder = $request->product_code_id;
        $reOrder = array_merge($nonOrder);
        $request->merge(['product_code_id'=>$reOrder]);

        foreach ($request->product_code_id as $key => $value) {
            $data = array(
                      'po_no_id' =>$id,
                      'product_code_id'=>$request->product_code_id[$key],
                      'weight_unit_id'=>$request->weight_unit_id[$key],
                      'packing_id'=>$request->packing_id[$key],
                      'binding_id'=>$request->binding_id[$key],
                      'net_weight'=>$request->net_weight[$key],
                      'price'=>$request->price[$key],
                      'total_amount'=>$request->total_amount[$key]);
                      OrderDetail::insert($data);  
        }
            $request->session()->put('data-order',$request->except('link_to_specs'));
            //return $request->session()->pull('data-order');

         return redirect()->route('user.index')->with('success','Order save successfully');
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
