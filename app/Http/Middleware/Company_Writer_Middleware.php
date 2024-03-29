<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Company_Writer_Middleware
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
        if(auth()->user()->role==2 || auth()->user()->role==4)
        return $next($request);

       abort(403);
    }
}
