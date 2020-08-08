<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Order;
use App\Shipment;
use App\OrderDetail;
use App\PaymentLocal;

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
		$details = OrderDetail::where('po_no_id',$request->po_no_id)->get();
		$html = view('user.partials.shipment-detail',compact('details'))->render();
		$orders = array(
			'supplier' => $order->supplier->supplier,
			'manufacturer' => $order->manufacturer->manufacturer_name,
			'po_date' => $order->po_date,
			'pol' => $order->pols->pod_name,
			'pod' => $order->pods->pod_name,
			'payment_term' => $order->paymentTerm->payment_terms,
			'co' => $order->certificateOfOrigin->certificate_of_origin,
			'incoterm' => $order->incoterm->incoterms,
			'eta' => $order->eta_request,
			'origin' => $order->origin->origin_name,
			'type_of_shipment' => $order->type_of_shipment);

		$sub = Shipment::where('po_no_id',$request->po_no_id)->get();
		$output = '<option selected>Select Sub PO.</option>';	
		foreach($sub as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->id.'</option>';
		}
		return response()->json(['order' => $orders,'output' => $output, 'html' => $html ]);
	}
	public function selectSubPO(Request $request)	
	{
		$paymentLocal = PaymentLocal::where([['po_no_id',$request->po_no_id],['sub_po_no_id',$request->sub_po]])->get();
		$output = '<option selected>Select Type of service</option>';
		foreach ($paymentLocal as $row) {
			$output .= '<option value="'.$row->type_of_service.'">'.$row->type_of_service.'</option>';
		}
		return response()->json(['output' => $output]);
	}
	public function local()
	{
		$shipments = Order::pluck('id');
		return view('user.reports.payment-local-report',compact('shipments'));
	}
	public function showPaymentLocal(Request $request)
	{
		$type = $request->type_of_service;
        $detail = PaymentLocal::where([['type_of_service',$type],['sub_po_no_id',$request->sub_po]])->first();
        $data = array(
        	'po_date' => $detail->po_date,
        	'incoterm' => $detail->incoterms_id,
        	'pol' => $detail->pols->pod_name,
        	'pr_no' => $detail->pr_no,
        	'eta' => $detail->eta,
        	'bl_date' => $detail->bl_date,
        	'due_date' => $detail->due_date,
        	'pr_date' => $detail->pr_date);
		$html = view('user.partials.payment-local-detail',compact('detail'))->render();
		return response()->json(['html' => $html, 'local' => $data]);

	}
	public function printPDF(Request $request)	
	{
		$this->validate($request,[
			'type_po' => 'required',
		]);
		$data = $request->all();
		$pdf = PDF::loadView('user.reports.invoice-pdf',compact('data'));
		return $pdf->stream('invoice.pdf');
	}
	public function printLocalPDF(Request $request)	
	{
		$this->validate($request,[
			'type_po' => 'required',
			'sub_po' => 'required',
			'type_service' => 'required',
		]);
		$data = $request->all();
		$pdf = PDF::loadView('user.reports.payment-local-pdf',compact('data'));
		return $pdf->stream('invoice.pdf');
	}
}
