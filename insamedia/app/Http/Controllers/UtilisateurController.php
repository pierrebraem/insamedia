<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PublicationController;

use App\Models\Utilisateur;
use App\Models\Visibilite;
use App\Models\Amis;

class UtilisateurController extends Controller
{
    public function obtenirTousAmis($id){
        return Amis::where('idcompted', $id)->where('attente', 0)->get();
    }

    public function estAmi($id1, $id2){
        if(Amis::where('idcompter', $id1)->where('idcompted', $id2)->where('attente', 0)->orWhere('idcompted', $id1)->where('idcompter', $id2)->where('attente', 0)->first() !== null){
            return true;
        }
        return false;
    }

    public function checkDemandeurAmi($idD, $idR){
        return Amis::where('idcompted', $idD)->where('idcompter', $idR)->where('attente', 1)->first();
    }

    public function checkReceveurAmi($idR, $idD){
        return Amis::where('idcompter', $idR)->where('idcompted', $idD)->where('attente', 1)->first();
    }

    public function obtenirPublications(Request $request, $id){
        $publications = PublicationController::obtenirPublicationsProfil($id);
        foreach($publications as $publication){
            $publication->anciennete = PublicationController::calculTempsPublication($publication->date);
            $publication->aimer = PublicationController::obtenirNombreAimes($publication->id);
            $publication->aimeDeja = PublicationController::aimeDeja($request, $publication->id);
            $publication->commentaires = PublicationController::obtenirCommentaires($publication->id);
        }
        return $publications;
    }

    public function afficherProfil(Request $request, $id){
        $id = intval($id);
        $demandeurAmi = null;
        $receveurAmi = null;
        $utilisateur = Utilisateur::firstWhere('id', $id);
        $publications = $this->obtenirPublications($request, $id);

        if($utilisateur === null){
            return view('profil\profilErreur');
        }
        else{
            $amis = $this->obtenirTousAmis($id);
            if($request->session()->get('id') !== $id){
                $demandeurAmi = $this->checkDemandeurAmi($request->session()->get('id'), $id);
                $receveurAmi = $this->checkReceveurAmi($request->session()->get('id'), $id);
            }
            return view('profil\profil')->with('utilisateur', $utilisateur)
                                        ->with('amis', $amis)
                                        ->with('demandeurAmi', $demandeurAmi)
                                        ->with('receveurAmi', $receveurAmi)
                                        ->with('estAmi', $this->estAmi($request->session()->get('id'), $id))
                                        ->with('visibilites', Visibilite::all())
                                        ->with('publications', $publications);
        }
    }

    public function ajouterAmis(Request $request, $id){
        if(Utilisateur::firstWhere('id', $id) === null){
            return view('profil\profilErreur');
        }
        else{
            $ajoutAmis = new Amis;
            $ajoutAmis->idcompted = $request->session()->get('id');
            $ajoutAmis->idcompter = $id;
            $ajoutAmis->save();

            NotificationController::enregistrerNotification(Utilisateur::where('id', $request->session()->get('id'))->value('pseudo').' veut être votre ami', $id, $request->session()->get('id'));
            return back();
        }
    }

    public function accepterAmis(Request $request, $id){
        $id = intval($id);

        if(Utilisateur::firstWhere('id', $id) === null || Amis::where('idcompter', $request->session()->get('id'))->where('idcompted', $id)->where('attente', 1)->first() === null){
            return view('profil\profilErreur');
        }
        else{
            Amis::where('idcompter', $request->session()->get('id'))->where('idcompted', $id)->where('attente', 1)->update(['attente' => 0]);
            NotificationController::MAJNotification('Vous avez acceptés la demande d\'amis de '.Utilisateur::where('id', $id)->value('pseudo'), $request->session()->get('id'), $id);
            NotificationController::enregistrerNotification(Utilisateur::where('id', $request->session()->get('id'))->value('pseudo').' a accepté d\'être votre ami', $id, $request->session()->get('id'));
            return back();
        }
    }

    public function supprimerAmis(Request $request, $id){
        $id = intval($id);
        if(Amis::where('idcompter', $request->session()->get('id'))->where('idcompted', $id)->first() !== null){
            Amis::where('idcompter', $request->session()->get('id'))->where('idcompted', $id)->delete();
            NotificationController::MAJNotification('Vous avez refusés la demande d\'amis de '.Utilisateur::where('id', $id)->value('pseudo'), $request->session()->get('id'), $id);
            return back();
        }
        else if(Utilisateur::firstWhere('id', $id) === null || Amis::where('idcompted', $request->session()->get('id'))->where('idcompter', $id)->first() === null){
            return view('profil\profilErreur');
        }
        else{
            Amis::where('idcompted', $request->session()->get('id'))->where('idcompter', $id)->delete();
            return back();
        }
    }
}