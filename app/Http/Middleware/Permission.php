<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct()
    {
        View::composers([
            'App\Composers\HomeComposer' =>['admin.*',]
        ]);
    }

    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('admin')) {
            return redirect()->route('login');
        }
        $admin_email=$request->session()->get('admin');
        $admin=DB::table('admin')->where('admin_email',$admin_email)->first();
        View::share(['admin'=>$admin,'admin_email'=>$admin_email]);
        return $next($request);
    }
}
