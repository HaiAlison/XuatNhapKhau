<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Origin;
class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = Origin::all();
        $title = 'Origin Name';
        $name= 'origin_name';
        return view('admin.show',compact('title','nameToForeach','name'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = ['origin_name' => 'Origin Name'];
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
            'id' => 'required|unique:origins',
            'origin_name' => 'required',
        ]);
        Origin::create($request->except('_token'));
        return redirect()->route('admin.origin')->with('success','Create success!');
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
        $data = Origin::findOrFail($id);
        $name = ['origin_name' => 'Origin Name'];
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
        
        $idTable  = Origin::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.origin')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = Origin::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = Origin::onlyTrashed()->get();
        $title = 'Origin';
        $name= 'origin_name';
        $del = 'ok';
        $back = route('admin.origin');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = Origin::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.origin')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = Origin::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
