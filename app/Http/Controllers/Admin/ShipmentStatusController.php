<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShipmentStatus;
class ShipmentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = ShipmentStatus::all();
        $title = 'Shipment Status';
        $name= 'shipment_status';
        $another = [''=>''];
        return view('admin.show',compact('title','nameToForeach','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = ['shipment_status' => 'Shipment Status'];
          return view('admin.edit',compact('name'));
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
            'id' => 'required|unique:shipment_status',
            'shipment_status' => 'required',
        ]);
        ShipmentStatus::create($request->except('_token'));
        return redirect()->route('admin.shipment-status')->with('success','Create success!');
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
        $data = ShipmentStatus::findOrFail($id);
        $name = ['shipment_status' => 'Shipment Status'];
        return view('admin.edit',compact('data','name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        
        $idTable  = ShipmentStatus::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.shipment-status')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = ShipmentStatus::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = ShipmentStatus::onlyTrashed()->get();
        $title = 'Shipment Status';
        $name= 'shipment_status';
        $del = 'ok';
        $back = route('admin.shipment-status');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = ShipmentStatus::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.shipment-status')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = ShipmentStatus::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
