<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminCheckLogin
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
        if(empty(session('username')) or empty(session('password')) ){
            return redirect('admin');
        }
        return $next($request);
    }
}
