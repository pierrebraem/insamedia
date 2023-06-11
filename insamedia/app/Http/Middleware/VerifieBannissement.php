<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

use App\Models\Bannissement;

class VerifieBannissement
{
    public function handle(Request $request, Closure $next){
        if(Bannissement::where('idcompte', $request->session()->get('id'))->count() != 0){
            return redirect('/banni');
        }
        return $next($request);
    }
}