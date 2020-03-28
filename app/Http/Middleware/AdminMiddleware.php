<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Url;

class AdminMiddleware
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
        if (Auth::user()->user_type > 2)        
            return $next($request);
        else 
            return back()->with('error', 'No tienes el nivel para poder acceder a esta sección: ' . url()->current());
    }
}
