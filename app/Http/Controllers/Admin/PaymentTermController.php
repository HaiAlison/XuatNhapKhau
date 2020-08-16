<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PaymentTerm;
class PaymentTermController extends Controller
{
    public function index()
    {
        $nameToForeach = PaymentTerm::all();
        $title = 'Payment Terms';
        $name= 'payment_terms';
        $another = '';
        return view('admin.show',compact('title','nameToForeach','name'));
    }
    public function create()
    {
        $name = ['payment_terms' => 'Payment Terms'];
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
            'id' => 'required|unique:payment_terms',
            'payment_terms' => 'required',
        ]);
        PaymentTerm::create($request->except('_token'));
        return redirect()->route('admin.payment-terms')->with('success','Create success!');
    }
    public function edit($id)
    {
        $data = PaymentTerm::findOrFail($id);
        $name = ['payment_terms' => 'Payment Terms'];
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
        
        $idTable  = PaymentTerm::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.payment-terms')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = PaymentTerm::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = PaymentTerm::onlyTrashed()->get();
        $title = 'Payment Terms';
        $name= 'payment_terms';
        $del = 'ok';
        $back = route('admin.payment-terms');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = PaymentTerm::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.payment-terms')->with('success','A row has been restored!');
    }
    public function force($id)
    {
         $idTable = PaymentTerm::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
