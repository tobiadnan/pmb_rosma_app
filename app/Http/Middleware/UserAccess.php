<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $typeCheck)
    {
        if (auth()->user()->is_admin == 0 && $typeCheck == "user") {
            return $next($request);
        } elseif (auth()->user()->is_admin == 1 && $typeCheck == "admin") {
            return $next($request);
        }

        return redirect()->route('main_page');
    }
}
