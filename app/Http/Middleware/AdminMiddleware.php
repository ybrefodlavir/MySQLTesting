<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && Auth::user()->is_admin == '0') {
        //     return $next($request);
        // } else if (Auth::check() && Auth::user()->is_admin == '1') {
        //     return redirect('/dosen_bank_soal');
        // } else {
        //     return $next($request);
        // }
        if (Auth::user()->is_admin != '1') {
            return back();
        }
        // return redirect('/dosen_bank_soal');
        return $next($request);
    }
}
