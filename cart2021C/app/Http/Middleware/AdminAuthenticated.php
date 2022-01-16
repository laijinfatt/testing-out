<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminAuthenticated
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
            //if user is not admin
            if(Auth::user()->isUser()){
                return redirect(route('viewProduct'));
            }

            //allow admin to proceed
            else if(Auth::user()->isAdmin()){
                return $next($request);
            }
        }
        abort(404);//for other user throw 404 error
    }
}
