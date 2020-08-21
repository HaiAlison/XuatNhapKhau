<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Order;
use App\Shipment;
use App\OrderDetail;
use App\PaymentLocal;
use App\PaymentOversea;

class InvoiceController extends Controller
{

	public function index($i)
	{

		$shipments = Order::pluck('id');
		$local = PaymentLocal::groupBy('po_no_id')->pluck('po_no_id');
		$oversea = PaymentOversea::groupBy('po_no_id')->pluck('po_no_id');
		switch ($i) {
			case 'order':
			return view('user.reports.invoice',compact('shipments'));
			break;
			case 'payment-oversea':
			return view('user.reports.payment-oversea-report',compact('oversea'));
			break;
			case 'payment-local':
			return view('user.reports.payment-local-report',compact('local'));
			break;
			default: return abort(404);
			break;
		}
	}
	public function selectPO(Request $request,$type)
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
		switch ($type) {
			case 'local':
			$sub = PaymentLocal::select('sub_po_no_id')->where('po_no_id',$request->po_no_id)->distinct()->get();
			break;
			case 'oversea':
			$sub = PaymentOversea::where('po_no_id',$request->po_no_id)->get();
			break;
			
			default: $sub = [];
			break;
		}
		$output = '<option selected>Select Sub PO.</option>';	
		foreach($sub as $key => $row)
		{
			$output .= '<option value="'.$row->sub_po_no_id.'">'.$row->sub_po_no_id.'</option>';
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
	
	public function showPaymentLocal(Request $request)
	{
		$type = $request->type_of_service;
		$detail = PaymentLocal::where([['type_of_service',$type],['sub_po_no_id',$request->sub_po]])->first();
		$data = array(
			'po_date' => $detail->po_date,
			'incoterm' => $detail->incoterm->incoterms,
			'pol' => $detail->pols->pod_name,
			'pr_no' => $detail->pr_no,
			'eta' => $detail->eta,
			'bl_date' => $detail->bl_date,
			'due_date' => $detail->due_date,
			'pr_date' => $detail->pr_date,
			'origin' => $detail->item_origin,
			'type_of_shipment' => $detail->ship,);
		$html = view('user.partials.payment-local-detail',compact('detail'))->render();
		return response()->json(['html' => $html, 'local' => $data]);

	}
	public function showPaymentOversea(Request $request)
	{
		$type = $request->type_of_service;
		$detail = PaymentOversea::where([['po_no_id',$request->po_no_id],['sub_po_no_id',$request->sub_po]])->first();
		// $paymentTerm = $detail->payment_term;
		// $blDate = $detail->bl_date;
		// $dueDate = strtotime($paymentTerm) + strtotime($blDate);
		$data = array(
			'po_date' => $detail->po_date,
			'incoterm' => $detail->incoterm->incoterms,
			'pol' => $detail->pols->pod_name,
			'pr_no' => $detail->pr_no,
			'eta' => $detail->eta,
			'bl_date' => $detail->bl_date,
			'due_date' => $detail->due_date,
			'ship' => $detail->ship,
			'origin' => $detail->origin->origin_name,
			'pr_date' => $detail->pr_date,
			'item_packing' => $detail->packing->packing,
			'item_source' => $detail->manufacturer->manufacturer_name,
			'payment_term' => $detail->payment_term,
			
		);
		
		$html = view('user.partials.payment-oversea-detail',compact('detail'))->render();
		return response()->json(['html' => $html, 'oversea' => $data]);
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
		],[ 'type_po.required' => 'The PO No. field is required.',
		'type_service.required' => 'The Type of Service field is required.',
		'sub_po.required' => 'The Sub No. field is required.',
	]);
		$data = $request->all();
		$pdf = PDF::loadView('user.reports.payment-local-pdf',compact('data'));
		return $pdf->stream('invoice.pdf');
	}
	public function printOverseaPDF(Request $request)	
	{
		$this->validate($request,[
			'type_po' => 'required',
			'sub_po' => 'required',
		],[ 'type_po.required' => 'The PO No. field is required.',
		'sub_po.required' => 'The Sub No. field is required.',
	]);
		$data = $request->all();
		$pdf = PDF::loadView('user.reports.payment-oversea-pdf',compact('data'));
		return $pdf->stream('invoice.pdf');
	}

}
