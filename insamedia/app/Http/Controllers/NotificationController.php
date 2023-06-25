<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\PublicationController;

use App\Models\Notification;

class NotificationController extends Controller
{
    /*
    * Fonction qui permet d'obtenir le nombre de notifications non vue
    */
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

    /*
    * Fonction qui permet de se rediriger quand on clique sur une publication. Elle permet également de mettre la notification à vue
    * paramètre : l'id de la notification
    */
    public function redirect($id){
        $id = intval($id);

        $notification = Notification::where('id', $id);
        $notification->update(['vu' => 1]);
        $idPublication = $notification->value('idpublication');
        return redirect('/publication/'.$idPublication);
    }

    /*
    * Fonction qui permet d'enregistrer une notification
    * paramètre : 
    * - contenu : le texte de la notification
    * - idcompter : l'id du compte qui va recevoir la notification
    * - idcompteo : l'id du compte concerner par la notification
    * - type : type de la notification
    * - idpublication : l'id de la publication concerner par la publication. Si null, alors la notification est une demande d'amis.
    */
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

    /*
    * Fonction qui permet de mettre à jour une notification
    * paramètre : 
    * - contenu : le texte de la notification
    * - idcompter : l'id du compte qui va recevoir la notification
    * - idcompteo : l'id du compte concerner par la notification
    * - type : type de la notification
    * - idpublication : l'id de la publication concerner par la publication. Si null, alors la notification est une demande d'amis.
    */
    public static function MAJNotification($contenu, $idcompter, $idcompteo, $type, $idpublication = null){
        Notification::where('idcompter', $idcompter)->where('idcompteo', $idcompteo)->where('idpublication', $idpublication)->update(['contenu' => $contenu, 'date' => Carbon::now(), 'idtype' => $type]);
    }
}