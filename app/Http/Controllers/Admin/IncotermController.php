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
    }
}
