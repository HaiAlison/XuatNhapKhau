<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User, App\Admin;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->role == "employee"){
            User::create($request->except('_token'));
            return redirect()->route('admin.show-account',['role'=>'employee'])->with('success','Create account success!');
        }
        else{
            Admin::create($request->except('_token'));
        
        return redirect()->route('admin.show-account',['role'=>'admin'])->with('success','Create account success!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        if($role == 'employee')
        {
            $nameToForeach = User::all();
            $title = 'First name';
            $name= 'firstname';
            $another = [
                    'middlename' => 'Middle name',
                    'lastname'=>'Last name',
                    'email' => 'Email',
                    ];
            $role = 'employee';
            return view('admin.show',compact('title','nameToForeach','name','another','role'));
        }
       
        $nameToForeach = Admin::all();
        $title = 'First name';
        $name= 'firstname';
        $another = [
                'middlename' => 'Middle name',
                'lastname'=>'Last name',
                'email' => 'Email',
                ];
        $role = 'admin';
        return view('admin.show',compact('title','nameToForeach','name','another','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role,$id)
    {
        $role == 'admin' ? $data = Admin::findOrFail($id) : $data = User::findOrFail($id);
        
        return view('auth.register',compact('data','role'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role,$id)
    {
        if($role == 'employee')
        {
            $data = User::findOrFail($id);
            $input = $request->except('_token');
            $data->fill($input)->save();
        return redirect()->route('admin.show-account',['role'=>$role])->with('success','Edit success!');
        }
        $data = Admin::findOrFail($id);
            $input = $request->except('_token');
            $data->fill($input)->save();
        return redirect()->route('admin.show-account',['role'=>$role])->with('success','Edit success!');
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
