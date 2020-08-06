<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Order;
use App\Shipment;
use App\ShipmentDetail;

class InvoiceController extends Controller
{

	public function index()
	{

		$shipments = Order::pluck('id');
		return view('user.reports.invoice',compact('shipments'));

	}
	public function selectPO(Request $request)
	{
		$order = Order::where('id',$request->po_no_id)->first();
		$sub = Shipment::where('po_no_id',$request->po_no_id)->get();
		$supplier = $order->supplier->supplier;
		$output = '<option selected>Select Sub PO.</option>';		
		foreach($sub as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->id.'</option>';
		}
		return response()->json(['order' => $order,'output' => $output, 'sup']);
	}
	public function selectSubPO(Request $request)
	{
		if($request->ajax()){
			$details = ShipmentDetail::where('sub_po_no_id',$request->sub_po)->get();
			$html = view('user.partials.shipment-detail',compact('details'))->render();
			return response()->json(['html'=> $html]);
		}	
	}
	public function printPDF(Request $request)	
	{
		$this->validate($request,[
            'type_po' => 'required',
            'sub_po' => 'required',
        ]);
		$data = $request->all();
		$pdf = PDF::loadView('user.reports.invoice-pdf',compact('data'));
		return $pdf->stream('invoice.pdf');
	}
}
