<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CertificateOfOrigin;
class CertificateOfOriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nameToForeach = CertificateOfOrigin::all();
        $title = 'Certificate Of Origin';
        $name= 'certificate_of_origin';
        return view('admin.show',compact('title','nameToForeach','name'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = ['certificate_of_origin' => 'Certificate Of Origin'];
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
            'id' => 'required|unique:certificate_of_origins',
            'certificate_of_origin' => 'required',
        ]);
        CertificateOfOrigin::create($request->except('_token'));
        return redirect()->route('admin.index')->with('success','Create success!');
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
        $data = CertificateOfOrigin::findOrFail($id);
        $name = ['certificate_of_origin' => 'Certificate Of Origin'];
        return view('admin.edit',compact('data','name'));
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
        $idTable  = CertificateOfOrigin::findOrFail($id);
        $input = $request->except('_token');
        $idTable->fill($input)->save();
        return redirect()->route('admin.certificate-of-origin')->with('success','Edit success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idTable = CertificateOfOrigin::findOrFail($id);
        $idTable->delete();
        return back()->with('success','A row has been deleted!');
    }
    public function trash()   
    {

        $nameToForeach = CertificateOfOrigin::onlyTrashed()->get();
        $title = 'Certificate of Origin';
        $name= 'certificate_of_origin';
        $del = 'ok';
        $back = route('admin.certificate-of-origin');
        return view('admin.show',compact('title','nameToForeach','name','del','back'));
    }
    public function restore($id)
    {
        $idTable = CertificateOfOrigin::withTrashed()->findOrFail($id);
        $idTable->restore();
        return redirect()->route('admin.certificate-of-origin')->with('success','A row has been restored!');
    }
    public function force($id)
    {
        $idTable = CertificateOfOrigin::withTrashed()->findOrFail($id);
        $idTable->forceDelete();
        return back()->with('success','A row has been force delete!');
    }
}
