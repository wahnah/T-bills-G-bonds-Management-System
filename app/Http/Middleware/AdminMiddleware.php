<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        // for admin role = 1
        // for user role = 0

            if(Auth::user()->role == '1'){

                return $next($request);

            }else{

                return redirect('/dashboard')->with('error', 'access denied you are not admin');

        }


       }else {

        return redirect('/login')->with('error', 'Please login to access this page');


       }



    }
}
