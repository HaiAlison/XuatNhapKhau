<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\POStatus;
class PoStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = POStatus::all();
        $title = 'PO Status';
        $name= 'po_status';
       
        return view('admin.show',compact('title','nameToForeach','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = ['po_status' => 'PO Status'];
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
            'id' => 'required|unique:po_status',
            'po_status' => 'required',
        ]);
        POStatus::create($request->except('_token'));
        return redirect()->route('admin.po-status')->with('success','Create success!');
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
        $data = POStatus::findOrFail($id);
        $name = ['po_status' => 'PO Status'];
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
        
        $idTable  = POStatus::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.po-status')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = POStatus::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = POStatus::onlyTrashed()->get();
        $title = 'PO Status';
        $name= 'po_status';
        $del = 'ok';
        $back = route('admin.po-status');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = POStatus::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.po-status')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = POStatus::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
