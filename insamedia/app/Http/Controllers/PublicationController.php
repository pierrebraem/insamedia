<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Publication;

class PublicationController extends Controller
{
    public function publier(Request $request){
        $nouvellePublication = new Publication;

        $nouvellePublication->description = $request->input('publication');
        $nouvellePublication->date = Carbon::now();
        $nouvellePublication->idcompte = $request->session()->get('id');
        $nouvellePublication->idprofil = $request->session()->get('id');
        $nouvellePublication->idvisibilite = 1;

        $nouvellePublication->save();

        return back();
    }

    public static function obtenirPublicationsProfil($idProfil){
        $idProfil = intval($idProfil);

        return Publication::where('idprofil', $idProfil)->get();
    }

    public static function calculTempsPublication($date){
        $diff = Carbon::now()->diffInSeconds($date);
        if($diff > 60){
            return Carbon::now()->diffInMinutes($date).' min';
        }
        else if($diff > 3600){
            return Carbon::now()->diffInHours($date).'H';
        }
        return $diff.' s';
    }
}