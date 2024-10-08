<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->isAdmin == 1)
                {
                    return $next($request);
                }
            else
            {            
                return back()->with('error','Your account doesn\'t have permission to access this page');
            }
        }
        else
            return redirect()->route('admin.login');
    }
}
