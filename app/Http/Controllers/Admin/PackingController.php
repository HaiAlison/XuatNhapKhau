<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Packing;
class PackingController extends Controller
{
    public function index()
    {
        $nameToForeach = Packing::all();
        $title = 'Packing';
        $name= 'packing';
        return view('admin.show',compact('title','nameToForeach','name'));
    }
    public function create()
    {
        $name = ['packing' => 'Packing'];
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
            'id' => 'required|unique:packings',
            'packing' => 'required',
        ]);
        Packing::create($request->except('_token'));
        return redirect()->route('admin.packing')->with('success','Create success!');
    }
    public function edit($id)
    {
        $data = Packing::findOrFail($id);
        $name = ['packing' => 'Packing'];
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
        
        $idTable  = Packing::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.packing')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = Packing::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = Packing::onlyTrashed()->get();
        $title = 'Packing';
        $name= 'packing';
        $del = 'ok';
        $back = route('admin.packing');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = Packing::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.packing')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = Packing::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
