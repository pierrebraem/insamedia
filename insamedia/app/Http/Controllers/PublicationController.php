<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\NotificationController;

use App\Models\Publication;
use App\Models\Commentaire;
use App\Models\Aimer;
use App\Models\Utilisateur;

class PublicationController extends Controller
{
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

            $debutLien = $request->session()->get('id').$dossier.'/';
            $finLien = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32).'.'.$extension;
            $request->file('fichier')->move($debutLien, $finLien);
            $nouvellePublication->urlcontenu = $debutLien.$finLien;
        }

        $nouvellePublication->save();

        return back();
    }

    public function aimer(Request $request, $id){
        $id = intval($id);
        
        $aime = Aimer::where('idpublication', $id)->where('idcompte', $request->session()->get('id'))->first();
        if($aime == null){
            $nouveauAimer = new Aimer;
            $nouveauAimer->idpublication = $id;
            $nouveauAimer->idcompte = $request->session()->get('id');
            $nouveauAimer->save();

            NotificationController::enregistrerNotification(Utilisateur::where('id', $request->session()->get('id'))->value('pseudo').' a aimé une publication', Publication::where('id', $id)->value('idcompte'), $request->session()->get('id'), 2, $id);
        }
        else{
            Aimer::where('idpublication', $id)->where('idcompte', $request->session()->get('id'))->delete();
        }
        return back();
    }

    public static function obtenirPublicationsProfil($idProfil){
        $idProfil = intval($idProfil);
        return Publication::where('idprofil', $idProfil)->orderBy('date', 'desc')->get();
    }

    public static function calculTempsPublication($date){
        $diff = Carbon::now()->diffInSeconds($date);
        if($diff >= 86400){
            return Carbon::now()->diffInDays($date).'J';
        }
        else if($diff >= 3600){
            return Carbon::now()->diffInHours($date).'H';
        }
        else if($diff >= 60){
            return Carbon::now()->diffInMinutes($date).' min';
        }
        return $diff.' s';
    }

    public static function obtenirNombreAimes($id){
        $id = intval($id);

        return Aimer::where('idpublication', $id)->count();
    }

    public static function aimeDeja(Request $request, $id){
        if(Aimer::where('idpublication', $id)->where('idcompte', $request->session()->get('id'))->first() === null){
            return false;
        }
        return true;
    }

    public function commentaire(Request $request, $id){
        $id = intval($id);
        $nouveauCommentaire = new Commentaire;
        $nouveauCommentaire->idpublication = $id;
        $nouveauCommentaire->idcompte = $request->session()->get('id');
        $nouveauCommentaire->commentaire = $request->input('commentaire');
        $nouveauCommentaire->save();

        NotificationController::enregistrerNotification(Utilisateur::where('id', $request->session()->get('id'))->value('pseudo').' a commenté une publication', Publication::where('id', $id)->value('idcompte'), $request->session()->get('id'), 3, $id);

        return back();
    }

    public static function obtenirCommentaires($idPublication){
        $idPublication = intval($idPublication);
        return Commentaire::where('idpublication', $idPublication)->get();
    }
}