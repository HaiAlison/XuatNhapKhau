<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = Product::all();
        $title = 'Product';
        $name= 'product';
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
        $name = ['product' => 'Product'];
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
            'id' => 'required|unique:products',
            'product' => 'required',
        ]);
        Product::create($request->except('_token'));
        return redirect()->route('admin.product')->with('success','Create success!');
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
        $data = Product::findOrFail($id);
        $name = ['product' => 'Product'];
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
        
        $idTable  = Product::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.product')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = Product::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = Product::onlyTrashed()->get();
        $title = 'Product';
        $name= 'product';
        $del = 'ok';
        $back = route('admin.product');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = Product::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.product')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = Product::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
