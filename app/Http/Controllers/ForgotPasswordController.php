<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use Reminder;
class ForgotPasswordController extends Controller
{
	public function forgot()
	{
		return view('credentials.forgot');
	}

	public function doForgot(Request $request)
	{
		$user = User::where('email',$request->email)->first();

		//check if email doesn't exist on database
	
		if($user == null)
		{
			return redirect()->back()->with('error','Email not exists');

		}

		$user = Sentinel::findById($user->id);
		$reminder = Reminder::exists($user) ? : Reminder::create($user);
		dd($reminder->all());
		$this->sendEmail($user,$reminder->code);
		
		return redirect()->back()->with('success','Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder.');
		//get token to given link to change password
	}

	public function sendEmail($user, $code)
	{
		
	}
}
