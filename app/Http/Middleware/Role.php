<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        //return $next($request);
        if (Auth::check()) {
            $perans = explode('-', $role);
            foreach ($perans as $group) {
                if (Auth::user()->role == $group) {
                    return $next($request);
                }
            }
        }
    }
}
