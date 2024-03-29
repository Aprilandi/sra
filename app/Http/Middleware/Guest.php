<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Guest
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
        if(Auth::user()->role->role == 'Rumah Sakit'){
            return redirect()->route('rs.index');
        }
        elseif(Auth::user()->role->role == 'Kepolisian'){
            return redirect()->route('pl.index');
        }
        else{
            return $next($request);
        }
    }
}
