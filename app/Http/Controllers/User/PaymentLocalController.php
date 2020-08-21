<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentLocal;
use Excel;
use App\Order, App\Shipment, App\ShipmentDetail, App\TypeOfShipmentDetail;	
class PaymentLocalController extends Controller
{
    public function index()
    {
       $title = 'Payment Local';
       $local = 'local';
       return view('user.view-detail',compact('title','local'));
   }

   public function show(Request $request)
   {
    $purchaseOrder = Order::where('id',$request->id)->first();
    if($purchaseOrder != null){
        $typeOfShipmentDetail = TypeOfShipmentDetail::where('id',$purchaseOrder->id)->first();
        $inputDetail = Shipment::where([['id',$request->id_shipment],['po_no_id',$purchaseOrder->id]])->first();
        if($inputDetail!= null)
        {   
            $title = 'Payment Local';
            $local = 'local';
            $shipmentDetail = ShipmentDetail::where([['sub_po_no_id',$request->id_shipment],['po_no_id',$purchaseOrder->id]])->first();
            return view('user.view-detail',compact('purchaseOrder','inputDetail','typeOfShipmentDetail','shipmentDetail','title','local'));
        }
            $request->flash(); // giữ lại request
            return back()->with('error','Sub PO No. not found');
        }
        return back()->with('error','PO No. not found');

    }
    public function store(Request $request) 
    {
        $e = PaymentLocal::where([['type_of_service',$request->type_of_service],['sub_po_no_id',$request->sub_po_no_id]])->first();
        // check db xem có type_of_service hay chưa, nếu có rồi thì return msg (show modal bên view)
        if($e != null){
            return response()->json(['success' => true, 'msg' => 'ok','data'=> $e]);
        }
        PaymentLocal::create($request->except('_token'));
        return redirect()->route('user.index')->with('success','save success');
    }

    

    public function edit($po_no,$sub_po,$type_service)
    {
        $editPaymentLocal = PaymentLocal::where([['po_no_id',$po_no],['sub_po_no_id',$sub_po],['type_of_service',$type_service]])->firstOrFail();
        $local = 'local';
        return view('user.view-detail',compact('editPaymentLocal','local'));
    }
    public function update(Request $request,$po_no,$sub_po,$type_service)
    {
        $row  = PaymentLocal::where([['po_no_id',$po_no],['sub_po_no_id',$sub_po],['type_of_service',$type_service]])->first();
        $input = $request->except('_token');
        $row->fill($input)->save();
        return redirect()->route('user.payment-local')->with('success','Edit success');
    }

    public function export(Request $request)
    {
        return Excel::download(new ExcelController($request->except('_token')), 'PaymentLocal'.time().'.xlsx');
    }

    public function chooseDay(Request $request) 
    {
        //raw để dùng các hàm tính toán (count);
        $s = $request->start;
        $e = $request->end;
        // $paymentLocal = PaymentLocal::selectRaw('count(*) as id, po_no_id, ANY_VALUE(sub_po_no_id) as sub_po')->whereBetween('po_date',[$s,$e])->groupBy('po_no_id')->orderBy('id')->get();
        $x = PaymentLocal::whereBetween('po_date',[$s,$e])->get();
        $po_no = $x->unique('po_no_id'); 
        $sub_po = $x->unique('sub_po_no_id');
        $po = '<label class="text-left" for="checkAll"><input type="checkbox" id="checkAll"/> Choose all PO No.</label>';
        $sub = '<label class="text-left"><input type="checkbox" id="checkSubAll"/> Choose all Sub PO No.</label>';
        foreach ($po_no as $key => $row) {
            $po .= '<label data-for="'.$row->po_no_id.'" class="text-left"><input type="checkbox" class="po-checkbox"  value="'.$row->po_no_id.'" name="po_no'.$key.'" /> '.$row->po_no_id.'</label>';
        }
        foreach ($sub_po as $key => $row) {
            $sub .= '<label data-for="'.$row->sub_po_no_id.'" class="text-left"><input type="checkbox" class="sub-po-checkbox"  value="'.$row->sub_po_no_id.'" name="sub_po'.$key.'"/> '.$row->sub_po_no_id.'</label>';
        }

        return response()->json(['data'=> $x,'msg'=>'ok', 'po' => $po, 'sub_po' => $sub]);
    }
}
