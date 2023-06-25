<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class VerifieEstConnecte
{
    /* Middleware permettant de vérifier si l'utilisateur est connecté. Retour à la page précédante si ce n'est pas le cas */
    public function handle(Request $request, Closure $next){
        if($request->session()->has('id')){
            return back();
        }
        return $next($request);
    }
}