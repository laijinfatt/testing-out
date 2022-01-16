<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuthenticated
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
        if(Auth::check()){
            if(Auth::user()->isUser()){
                return $next($request);
            }

            //allow admin to proceed
            else if(Auth::user()->isAdmin()){
                return redirect(route('showProduct'));
            }
        }
        abort(404);//for other user throw 404 error
    }
}
