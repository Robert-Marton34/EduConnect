<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // User not logged in
            return redirect('/login');
        }

        if (Auth::user()->role !== $role) {
            // User role is not correct
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

