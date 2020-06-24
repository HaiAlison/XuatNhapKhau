<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Binding;
class BindingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = Binding::all();
        $title = 'Binding';
        $name= 'binding';
        $another = '';
       return view('admin.show',compact('title','nameToForeach','name','another'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $credentials = auth('web')->user();
          return view('admin.binding',compact('credentials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $binding = new Binding;
        $binding->id = $request->id;
        $binding->binding = $request->binding;
        $binding->save();
        return redirect()->route('admin.index')->with('success','create binding successful');
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
        $credentials = auth('web')->user();
        $binding = Binding::findOrFail($id);
        return view('admin.binding',compact('credentials','binding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $binding = Binding::find($id);
        $binding->id = $request->id;
        $binding->binding = $request->binding;
        $binding->save();
        return redirect()->route('admin.index')->with('success','Edit binding successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
