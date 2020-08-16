<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Incoterm;
class IncotermController extends Controller
{
    public function index()
    {
        $nameToForeach = Incoterm::all();
        $title = 'Incoterm';
        $name= 'incoterms';
        return view('admin.show',compact('title','nameToForeach','name'));
    }
    public function create()
    {
        $name = ['incoterms' => 'Incoterms'];
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
            'id' => 'required|unique:incoterms',
            'incoterms' => 'required',
        ]);
        Incoterm::create($request->except('_token'));
        return redirect()->route('admin.incoterms')->with('success','Create success!');
    }
    public function edit($id)
    {
        $data = Incoterm::findOrFail($id);
        $name = ['incoterms' => 'Incoterms'];
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
        
        $idTable  = Incoterm::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.incoterms')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = Incoterm::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = Incoterm::onlyTrashed()->get();
        $title = 'Incoterm';
        $name= 'incoterms';
        $del = 'ok';
        $back = route('admin.incoterms');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = Incoterm::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.incoterms')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = Incoterm::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
