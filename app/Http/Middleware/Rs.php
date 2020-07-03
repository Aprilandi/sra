<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Rs
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Auth::user()->role->role == 'Admin'){
            return redirect()->route('admin.index');
        }
        if(Auth::user()->role->role == 'Rumah Sakit'){
            return $next($request);
        }
        if(Auth::user()->role->role == 'Kepolisian'){
            return redirect()->route('pl.index');
        }
    }
}
