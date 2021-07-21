<?php

namespace App\Http\Middleware;

use App\userkRoles;
use Closure;
use Illuminate\Http\Request;

class preWorkersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next , $part , $type /* tpey : write or read or delete  */)
    {

        
        // the boss
        if(auth()->user()->role == 2)
             return $next($request);


        $u  =  userkRoles::where("user_id" , auth()->user()->id)->where('part_id',$part)->where($type,1)->get();

        if(count($u))
            return $next($request);

        abort(403)  ;         
    }
}
