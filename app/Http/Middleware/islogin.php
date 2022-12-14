<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class islogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //cek apakah ada history logi  di auth nya, kalau ada dibolehin lanjut akses laman
        if (Auth::check()){
            return $next($request);
        }
        //kalau gaada history login bakal diarahin lagi ke login dengan pesan 
        return redirect ('/')->with('notAllowed', 'silahkan login terlebih dahulu');
    }
    
}
