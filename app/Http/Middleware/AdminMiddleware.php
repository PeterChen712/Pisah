<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use App\Models\User;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Akses tidak diizinkan.');
    }
}