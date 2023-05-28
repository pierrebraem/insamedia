<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function obtenirNombreNotification($id){
        return Notification::where('idcompter', $id)->count();
    }

    public function afficherNotification(Request $request){
        return view('notification')->with('notifications', Notification::where('idcompter', $request->session()->get('id'))->get());
    }

    public function calculTempsPasser($tempsNotif){
        dd('coucou');
    }

    public static function enregistrerNotification($contenu, $idcompter, $idcompteo, $idpublication = null){
        $enregistrer = new Notification;
        $enregistrer->contenu = $contenu;
        $enregistrer->date = Carbon::now();
        $enregistrer->idtype = 1;
        $enregistrer->idcompter = $idcompter;
        $enregistrer->idcompteo = $idcompteo;
        $enregistrer->idpublication = $idpublication;
        $enregistrer->save();
    }

    public static function MAJNotification($contenu, $idcompter, $idcompteo, $idpublication = null){
        Notification::where('idcompter', $idcompter)->where('idcompteo', $idcompteo)->where('idpublication', $idpublication)->update(['contenu' => $contenu, 'date' => Carbon::now()]);
    }
}