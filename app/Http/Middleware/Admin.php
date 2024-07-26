<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && Auth::user()->email == 'admin21@gmail.com') {
        //     return $next($request);
        // }
        // return  redirect('menu.index')->with('error', 'Anda tidak memiliki akses!');
        return Auth::check() && Auth::user()->email == 'admin21@gmail.com' ?  $next($request) : redirect()->route('menu.index')->with('error', 'Anda tidak memiliki akses!');
    }
}
