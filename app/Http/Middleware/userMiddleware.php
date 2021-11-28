<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userMiddleware
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
        if(auth()->user()->role == 'admin'){
            return redirect('adminHome');
        }else if(auth()->user()->role == 'management'){
            return redirect('managementHome');
        }
        return $next($request);
    }
}
