<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    // public function handle(Request $request, Closure $next)
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if the user has the role of superadmin
            if (Auth::user()->role === 'superadmin') {
                return $next($request);
            }
        }

        // Redirect to a different route if the user is not a superadmin
        return redirect()->route('dashboard')->with('error', 'Access denied.');
    }
}
