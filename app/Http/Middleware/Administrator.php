<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class Administrator
{
    public function handle($request, $next)
    {
        if (Auth::user()->authority != 1) {
            return redirect()->route('mainpage');
        }
        return $next($request);
    }
}
