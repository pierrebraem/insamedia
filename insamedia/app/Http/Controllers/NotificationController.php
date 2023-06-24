<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\PublicationController;

use App\Models\Notification;

class NotificationController extends Controller
{
    public static function obtenirNombreNotifications(Request $request){
        return Notification::where('idcompter', $request->session()->get('id'))->where('vu', 0)->count();
    }

    public function afficherNotification(Request $request){
        $notifications = Notification::where('idcompter', $request->session()->get('id'))->get();
        foreach($notifications as $notification){
            $notification->anciennete = PublicationController::calculTempsPublication($notification->date);
        }

        return view('notification')->with('notifications', $notifications);
    }

    public function redirect($id){
        $id = intval($id);

        $notification = Notification::where('id', $id);
        $notification->update(['vu' => 1]);
        $idPublication = $notification->value('idpublication');
        return redirect('/publication/'.$idPublication);
    }

    public static function enregistrerNotification($contenu, $idcompter, $idcompteo, $type, $idpublication = null){
        $enregistrer = new Notification;
        $enregistrer->contenu = $contenu;
        $enregistrer->date = Carbon::now();
        $enregistrer->idtype = $type;
        $enregistrer->idcompter = $idcompter;
        $enregistrer->idcompteo = $idcompteo;
        $enregistrer->idpublication = $idpublication;
        $enregistrer->save();
    }

    public static function MAJNotification($contenu, $idcompter, $idcompteo, $type, $idpublication = null){
        Notification::where('idcompter', $idcompter)->where('idcompteo', $idcompteo)->where('idpublication', $idpublication)->update(['contenu' => $contenu, 'date' => Carbon::now(), 'idtype' => $type]);
    }
}