<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión.');
        }

        if (Auth::user()->role !== $role) {
            return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
        }

        return $next($request);
    }
}
