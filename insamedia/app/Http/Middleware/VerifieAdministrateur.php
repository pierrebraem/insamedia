<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class VerifieAdministrateur
{
    /* Middleware permettant de vérifier si l'utilisateur est administrateur. Retour à la page précédante si ce n'est pas le cas */
    public function handle(Request $request, Closure $next){
        if(!$request->session()->has('role') && $request->session()->get('role') != 3){
            return back();
        }
        return $next($request);
    }
}