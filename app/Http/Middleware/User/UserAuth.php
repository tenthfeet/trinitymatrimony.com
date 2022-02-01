<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
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
            return redirect('/login');
        }
        if((Auth::check())&&(Auth::user()->role =="user")){

            return $next($request);
        }
        abort(401);
    }
}