<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Writer
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
         if(auth()->user()->role== 4 || auth()->user()->role== 2)
        return $next($request);

        abort(403);
        return $next($request);
    }
}
