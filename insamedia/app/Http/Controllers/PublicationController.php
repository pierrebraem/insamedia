<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UtilisateurController;

use App\Models\Publication;
use App\Models\Commentaire;
use App\Models\Aimer;
use App\Models\Utilisateur;

class PublicationController extends Controller
{
    /*
    * Fonction qui permet de vérifier si un utilisateur à le droit de visionner cette publication
    * paramètres :
    * - idVisibilite : l'id de la visibilité. 1 = publique, 2 = amis seulement, 3 = privée
    * - id : l'id de la publication concerner
    */
    public static function autoriserVoirPublication(Request $request, $idVisibilite, $id){
        if($idVisibilite == 3 || $id == $request->session()->get('id')){
            return $id == $request->session()->get('id');
        }
        else if($idVisibilite == 2){
            return UtilisateurController::estAmi($request->session()->get('id'), $id);
        }
        else{
            return true;
        }
    }

    /*
    * Fonction qui permet d'afficher une publication dans la page publication. Affiche une erreur si la publication n'existe pas
    * paramètre : l'id de la publication concerner
    * Variable dans la vue : les informatios de la publication
    */
    public function afficher(Request $request, $id){
        $id = intval($id);
        $publication = Publication::where('id', $id)->first();
        if($publication == null){
            return view('publication/erreur');
        }

        $publication->anciennete = $this->calculTempsPublication($publication->date);
        $publication->aimer = $this->obtenirNombreAimes($publication->id);
        $publication->aimeDeja = $this->aimeDeja($request, $publication->id);
        $publication->commentaires = $this->obtenirCommentaires($publication->id);
        $publication->autoriser = $this->autoriserVoirPublication($request, $publication->idvisibilite, $publication->idcompte);

        if($publication->urlcontenu != null){
            $publication->extension = explode('.', $publication->urlcontenu)[1];
        }

        return view('publication/afficherPublication')->with('publication', $publication);
    }

    /*
    * Fonction qui permet de publier une publication
    * Paramètre : l'id du profil auquel la publication va être publier
    */
    public function publier(Request $request, $id){
        $id = intval($id);

        $request->validate([
            'publication' => ['required', 'string', 'min:1', 'max:255']
        ]);

        $nouvellePublication = new Publication;

        $nouvellePublication->description = $request->input('publication');
        $nouvellePublication->date = Carbon::now();
        $nouvellePublication->idcompte = $request->session()->get('id');
        $nouvellePublication->idprofil = $id;
        $nouvellePublication->idvisibilite = $request->input('visibilite');
        if($request->input('aCommentaire') === null){
            $nouvellePublication->aCommentaire = 1;
        }
        else{
            $nouvellePublication->aCommentaire = 0;
        }

        /* Vérifie si il y a un fichier. Si oui, où l'enregistrer en fonction de son format */
        if($request->hasFile('fichier')){
            $extension = $request->file('fichier')->getClientOriginalExtension();

            if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif'){
                $dossier = '/images';
            }
            else if($extension == 'mp4'){
                $dossier = '/videos';
            }
            else if($extension == 'mp3'){
                $dossier = '/audios';
            }
            else{
                $dossier = '/autres';
            }

            /* Le contenu est stocké dans le dossier public. Tous son contenus se situe dans un dossier auquel son nom est l'id de l'utilisateur */
            $debutLien = $request->session()->get('id').$dossier.'/';
            $finLien = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32).'.'.$extension;
            $request->file('fichier')->move($debutLien, $finLien);
            $nouvellePublication->urlcontenu = $debutLien.$finLien;
        }

        $nouvellePublication->save();

        return back();
    }

    /*
    * Fonction qui permet d'aimer une publication
    * Paramètre : l'id de la publication concerner
    */
    public function aimer(Request $request, $id){
        if($request->session()->has('id')){
            $id = intval($id);
        
            $aime = Aimer::where('idpublication', $id)->where('idcompte', $request->session()->get('id'))->first();
            if($aime == null){
                $nouveauAimer = new Aimer;
                $nouveauAimer->idpublication = $id;
                $nouveauAimer->idcompte = $request->session()->get('id');
                $nouveauAimer->save();
    
                if($request->session()->get('id') != Publication::where('id', $id)->value('idcompte')){
                    NotificationController::enregistrerNotification(Utilisateur::where('id', $request->session()->get('id'))->value('pseudo').' a aimé une publication', Publication::where('id', $id)->value('idcompte'), $request->session()->get('id'), 2, $id);
                }
            }
            else{
                Aimer::where('idpublication', $id)->where('idcompte', $request->session()->get('id'))->delete();
            }
        }
        return back();
    }

    /*
    * Fonction qui permet d'obtenir toutes les publications d'un profil du plus récent au plus vieux
    * Paramètre : l'id du profil concerner
    */
    public static function obtenirPublicationsProfil($idProfil){
        $idProfil = intval($idProfil);
        return Publication::where('idprofil', $idProfil)->orderBy('date', 'desc')->get();
    }

    /*
    * Fonction qui permet de calculer l'ancienneter d'une publication
    * Paramètre : la date de publication d'une publication
    */
    public static function calculTempsPublication($date){
        $diff = Carbon::now()->diffInSeconds($date);
        /* Si elle est de plus de 86400s, afficher l'ancienneter en jours */
        if($diff >= 86400){
            return Carbon::now()->diffInDays($date).'J';
        }
        /* Si elle est de plus de 3600s, afficher l'ancienneter en heures */
        else if($diff >= 3600){
            return Carbon::now()->diffInHours($date).'H';
        }
        /* Si elle est de plus de 60s, afficher l'ancienneter en minutes */
        else if($diff >= 60){
            return Carbon::now()->diffInMinutes($date).' min';
        }
        return $diff.' s';
    }

    /*
    * Fonction qui permet d'obtenir le nombre d'aime d'une publication
    * Paramètre : l'id de la publication concerner
    */
    public static function obtenirNombreAimes($id){
        $id = intval($id);

        return Aimer::where('idpublication', $id)->count();
    }

    /*
    * Fonction qui permet de vérifier si un utilisateur aime déjà une publication
    * Paramètre : l'id de la publication concerner
    */
    public static function aimeDeja(Request $request, $id){
        if(Aimer::where('idpublication', $id)->where('idcompte', $request->session()->get('id'))->first() === null){
            return false;
        }
        return true;
    }

    /*
    * Fonction qui permet d'ajouter un nouveau commentaire dans une publication
    * Paramètre : l'id de la publication concerner
    */
    public function commentaire(Request $request, $id){
        $id = intval($id);
        $nouveauCommentaire = new Commentaire;
        $nouveauCommentaire->idpublication = $id;
        $nouveauCommentaire->idcompte = $request->session()->get('id');
        $nouveauCommentaire->commentaire = $request->input('commentaire');
        $nouveauCommentaire->save();

        if($request->session()->get('id') != Publication::where('id', $id)->value('idcompte')){
            NotificationController::enregistrerNotification(Utilisateur::where('id', $request->session()->get('id'))->value('pseudo').' a commenté une publication', Publication::where('id', $id)->value('idcompte'), $request->session()->get('id'), 3, $id);
        }

        return back();
    }

    /*
    * Fonction qui permet d'obtenir les commentaires d'une publication
    * Paramètre : l'id de la publication concerner
    */
    public static function obtenirCommentaires($idPublication){
        $idPublication = intval($idPublication);
        return Commentaire::where('idpublication', $idPublication)->get();
    }
}