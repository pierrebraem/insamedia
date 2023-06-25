<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class VerifieEstConnecte
{
    public function handle(Request $request, Closure $next){
        if($request->session()->has('id')){
            return back();
        }
        return $next($request);
    }
}