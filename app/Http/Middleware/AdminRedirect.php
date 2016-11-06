<?php

namespace App\Http\Middleware;

use Closure;

class AdminRedirect
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
        if(\Auth::user()->usertype != 0){
            return view('errors.403');
        }

        return $next($request);
    }
}
