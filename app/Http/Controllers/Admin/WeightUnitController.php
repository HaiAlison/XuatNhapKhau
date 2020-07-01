<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WeightUnit;
class WeightUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = WeightUnit::all();
        $title = 'Weight Unit';
        $name= 'weight_unit';
        return view('admin.show',compact('title','nameToForeach','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = ['weight_unit' => 'Weight Unit'];
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
       
        WeightUnit::create($request->except('_token'));
        return redirect()->route('admin.weight-unit')->with('success','Create success!');
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
        $data = WeightUnit::findOrFail($id);
        $name = ['weight_unit' => 'Weight Unit'];
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
        
        $idTable  = WeightUnit::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.weight-unit')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = WeightUnit::findOrFail($id);
        $idTable->delete();
    }
}
