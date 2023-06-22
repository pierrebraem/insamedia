<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class VerifieAdministrateur
{
    public function handle(Request $request, Closure $next){
        if(!$request->session()->has('role') && $request->session()->get('role') != 3){
            return back();
        }
        return $next($request);
    }
}