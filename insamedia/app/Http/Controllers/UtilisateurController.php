<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilisateur;
use App\Models\Amis;

class UtilisateurController extends Controller
{
    public function obtenirTousAmis($id){
        return Amis::where('idcompted', $id)->get();
    }

    public function checkDemandeurAmi($idD, $idR){
        return Amis::where('idcompted', $idD)->where('idcompter', $idR)->first();
    }

    public function checkReceveurAmi($idR, $idD){
        return Amis::where('idcompter', $idR)->where('idcompted', $idD)->first();
    }

    public function afficherProfil(Request $request, $id){
        $id = intval($id);
        $demandeurAmi = null;
        $receveurAmi = null;
        $utilisateur = Utilisateur::firstWhere('id', $id);

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
                                        ->with('receveurAmi', $receveurAmi);
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
            return back();
        }
    }
}