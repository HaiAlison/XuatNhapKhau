<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order, App\Shipment, App\TypeOfShipmentDetail, App\ShipmentDetail;

class ViewDetailController extends Controller
{

	
	public function index()
	{
		return view('user.view-detail',['title' => 'View detail'],);
	}

    public function viewDetail(Request $request)
    {
    	
    	$order = Order::where('id',$request->id)->first();
    	if($order != null){
            $typeOfShipmentDetail = TypeOfShipmentDetail::where('id',$order->id)->first();
         	$shipment = Shipment::where([['id',$request->id_shipment],['po_no_id',$order->id]])->first();
            if($shipment!= null)
            {
                $title = 'View Detail';
                $shipmentDetails = ShipmentDetail::where('id',$order->id)->get();
                return view('user.view-detail',compact('order','shipment','typeOfShipmentDetail','shipmentDetails','title'));
            }
            $request->flash(); // giữ lại request
            return back()->with('error','Sub PO No. not found');
         }
    		return back()->with('error','PO No. not found');

    }
}
