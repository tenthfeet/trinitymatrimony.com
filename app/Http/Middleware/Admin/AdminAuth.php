<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(! Auth::check()){
            return redirect('/tmadmin');
        }
        if((Auth::check())&&(Auth::user()->role =="superadmin"||Auth::user()->role =="admin")){

            return $next($request);
        }
        abort(401);
    }
}
