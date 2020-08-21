<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
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
class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('po_date')->get();
        return view('admin.purchase-order.purchase-order',compact('orders'));
    }
    public function show($id)
    {
    	$order = Order::findOrFail($id);
        $container = TypeOfShipmentDetail::find($id);
        return view('admin.purchase-order.show-order',compact('order','container'));
    }
    public function edit($id)
    {

        $order = Order::findOrFail($id);
        $container = TypeOfShipmentDetail::find($id);
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

        return view('admin.purchase-order.edit-order',compact('order','container','poStatuses','origins','manufacturers','suppliers','pods','incoterms','containerSizes','cos','paymentTerms','products','weightUnits','packings','bindings',));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
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
            'eta_request' => 'required',
        ],
        [ 
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
            'marking.required' => 'The Marking field cannot be null',


        ]);
        $order = Order::find($id);
        $e = ['number_container','container_size_id','payload','freight_target','dthc_target','cic_target'];
        $input = $request->except($e);
        $order->fill($input)->save();  // cập nhật order
        $data = array_unshift($e, 'id'); //gán id vào mảng
        $container = $request->only($e);
        // nếu container thì cập nhật hoặc tạo, còn là vessel thì xóa.
        if($request->type_of_shipment == 'container'){
            TypeOfShipmentDetail::updateOrCreate($container);
        }
        else{
            TypeOfShipmentDetail::where('id',$id)->delete();
        }



        return redirect()->route('admin.show-order',$id)->with('success','Purchase order successfully editted!');
    }
}
