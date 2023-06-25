<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /*
    * Fonction permet d'afficher soit le fil d'actualité pour un utilisateur connecté ou la page de connexion pour les non-connectés
    */
    public function afficherAccueil(Request $request){
        if(!$request->session()->get('id')){
            return redirect('/connexion');
        }
        return view('accueilC');
    }
}
