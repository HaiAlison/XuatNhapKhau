<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function login() 
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {

        if(auth('user')->attempt(['email'=>$request->email, 'password'=> $request->password],$request->remember))
        {
            return redirect()->route('user.index')->with('success','Login success');
        }
        return redirect()->back()->with('error','Email or password not correct');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function storeRegister(Request $request)
    {
        $this->validate($request,[
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password',

        ],[
            'firstname.required' => "First name is required.",
            'middlename.required' => "Last name is required.",
            'lastname.required' => "Middle name is required.",
            'password.required' => "Password is required.",
            'password_confirmation.same' => 'Password Confirmation should match the Password',
            'password.min' => 'Your password must be at least 6 characters long'

        ]);
         $user = new User;
         $user->firstname = $request->fname;
         $user->middlename = $request->mname;
         $user->lastname = $request->lname;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $user->save();
         return redirect()->route('login')->with('success','Register success.');
    }
    public function logout()
    {
        auth('web')->logout();
        return redirect()->route('login');
    }

    public function index()
    {
        $credentials = auth('web')->user();
        return view('user.index',compact('credentials'));
    }
}
