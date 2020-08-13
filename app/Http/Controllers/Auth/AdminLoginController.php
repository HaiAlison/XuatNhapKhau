<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Binding;
class AdminLoginController extends Controller
{
   public function login()
    {
        return view('auth.admin-login');
    }

    public function doLogin(Request $request)
    {
        if(auth('web')->attempt(['email'=>$request->email, 'password'=> $request->password],$request->remember))
        {
            return redirect()->route('admin.index')->with('success','Login success');
            //you can use intented() when they trying to login before authentication filter
        }
        return redirect()->back()->with('error','Email or password not correct')->withInput($request->only('email','remember'));
            //withInput to save the old email input
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('admin.login');
    }
    public function index()
    {
        $credentials = auth('web')->user();
        return view('admin.dashboard',compact('credentials'));
    }
}
