<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            \Log::info('Admin not authenticated, redirecting to admin login.');
            return redirect()->route('admin.login');
        }

        \Log::info('Admin authenticated, proceeding to next middleware.');
        return $next($request);
    }

}
