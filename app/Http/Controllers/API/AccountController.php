<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
	function __construct()
	{
		$this->middleware('auth:api',['except'=>['login']]);
	}
   public function login(Request $request)
   {
   		$credentials = request(['email','password']);

   		if(! $token = auth('api')->attempt($credentials)){
   			return response()->json(['error' => 'Invalid email or password'],401);
   		}
   		return $this->responseWithToken($token);
   }
   public function responseWithToken($token)
   {
   		return response()->json([
   			'token' => $token,
   			'access_type' => 'bearer',
   		]);
   }
   public function logout()
   {
   		auth()->logout();
   		return response()->json(['msg' => 'User successfully logged out!'],200);
   }
   public function refresh()
   {
   		return responseWithToken(auth()->refresh());
   }
   public function me()
   {
   		return response()->json(auth()->user());
   }
}
