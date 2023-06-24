<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

use App\Http\Controllers\NotificationController;

use App\Models\Bannissement;

class NombreNotifs
{
    public function handle(Request $request, Closure $next){
        $request->session()->put('nombreNotifications', NotificationController::obtenirNombreNotifications($request));
        return $next($request);
    }
}