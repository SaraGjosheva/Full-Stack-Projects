<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutIfUserDeleted
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user() === null) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();


            return redirect()->route('home')->with(
                'error',
                'Вашиот профил повеќе не постои.'
            );
        }

        return $next($request);
    }
}
