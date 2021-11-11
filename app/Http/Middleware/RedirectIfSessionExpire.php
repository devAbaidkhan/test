<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class RedirectIfSessionExpire
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
        //dd(Session::has('vendor'));
        if (Session::has('vendor')) {
            return $next($request);
        }else{
            return redirect()->route('resturantlogin');
        }
        
    }
}
