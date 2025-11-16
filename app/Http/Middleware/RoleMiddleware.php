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
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard.index')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.'),
                'bengkel' => redirect()->route('bengkel.dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.'),
                'user' => redirect()->route('user.dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.'),
                default => redirect()->route('landing_page'),
            };
        }

        return $next($request);
    }
}
