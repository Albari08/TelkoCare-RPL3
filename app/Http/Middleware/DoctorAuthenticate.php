<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DoctorAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('doctor')->check()) {
            return redirect()->route('doctor.login');
        }

        return $next($request);
    }
}
