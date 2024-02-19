<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        //jika akun yang login sesuai dengan role
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home

        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }
        if (Auth::user()->role == 'user') {
            return Redirect::to('/');
        } elseif (Auth::user()->role == 'doctor') {
            return Redirect::to('/');
        } elseif (Auth::user()->role == 'admin') {
            return Redirect::to('/dashboard');
        }
    }
}
