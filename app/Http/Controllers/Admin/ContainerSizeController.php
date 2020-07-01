<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContainerSize;
class ContainerSizeController extends Controller
{
    public function index()
    {
        $nameToForeach = ContainerSize::all();
        $title = 'Container Size';
        $name= 'container_size';
        
        return view('admin.show',compact('title','nameToForeach','name'));
    }
    public function create()
    {
        $name = ['container_size' => 'Container Size'];
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
       
        ContainerSize::create($request->except('_token'));
        return redirect()->route('admin.container-size')->with('success','Create success!');
    }
    public function edit($id)
    {
        $data = ContainerSize::findOrFail($id);
        $name = ['container_size' => 'Container size'];
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
        
        $idTable  = ContainerSize::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.container-size')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = ContainerSize::findOrFail($id);
        $idTable->delete();
    }
}
