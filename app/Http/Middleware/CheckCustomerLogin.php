<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCustomerLogin
{
     public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect('/'); // ganti sesuai kebutuhan
        }

        return $next($request);
    }
}
