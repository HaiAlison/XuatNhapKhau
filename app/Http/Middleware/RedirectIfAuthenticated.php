<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {
            case 'admin':
                if(Auth::guard($guard)->check())
                {
                    return redirect()->route('admin.dashboard'); //nếu guard không phải admin thì sẽ return next request.
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                return redirect()->route('user.index'); //chỉnh dòng này về route index nếu auth_ed.
            }
                break;
        }        
        // if (Auth::guard($guard)->check()) {
        //     return redirect()->route('user.index'); //chỉnh dòng này về route index nếu auth_ed.
        // }

        return $next($request);
    }
}
