<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilisateur;
use App\Models\Amis;

class UtilisateurController extends Controller
{
    public function obtenirAmis($id){
        return Amis::where('idcompted', $id)->where('attente', 0)->get();
    }

    public function afficherProfil($id){
        $utilisateur = Utilisateur::firstWhere('id', $id);

        if($utilisateur === null){
            return view('profil\profilErreur');
        }
        else{
            $amis = $this->obtenirAmis($id);
            return view('profil\profil')->with('utilisateur', $utilisateur)->with('amis', $amis);
        }
    }
}