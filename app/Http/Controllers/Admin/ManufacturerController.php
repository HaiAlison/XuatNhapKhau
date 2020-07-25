<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manufacturer;
class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = Manufacturer::all();
        $title = 'Manufacturer';
        $name= 'manufacturer_name';
        $another = [
                'manufacturer_address' => 'Manufacturer Address',
                   ];

        return view('admin.show',compact('title','nameToForeach','name','another'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = ['manufacturer_name' => 'Manufacturer'];
        $another = ['manufacturer_address' => 'Manufacturer address',];
        return view('admin.edit',compact('name','another'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Manufacturer::create($request->except('_token'));
        return redirect()->route('admin.manufacturer')->with('success','Create success!');
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
        $data = Manufacturer::findOrFail($id);
        $name = ['manufacturer_name' => 'Manufacturer'];
        $another = ['manufacturer_address' => 'Manufacturer address',]; //add your col into array if you have it.
        return view('admin.edit',compact('data','name','another'));
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
        
        $idTable  = Manufacturer::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.manufacturer')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = Manufacturer::findOrFail($id);
        $idTable->delete();
    }
}
