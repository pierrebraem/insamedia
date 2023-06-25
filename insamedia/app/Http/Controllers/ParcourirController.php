<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilisateur;


class ParcourirController extends Controller
{
    /*
    * Fonction qui permet d'afficher la page parcourir
    */
    public function afficherParcourir(){
        return view('parcourir')->with('resultat', null);
    }

    /*
    * Fonction qui permet de rechercher les utilisateur à partir de la saisie de l'utilisateur
    * Variable dans la vue :
    * - resultat : resultat contenant les utilisateurs concerner par la recherche
    */
    public function rechercher(Request $request){
        $request->validate([
            'recherche' => ['required', 'string', 'min:1', 'max:255']
        ]);

        $resultat = Utilisateur::where('pseudo', 'LIKE', '%'.$request->input('recherche').'%')->get();
        return view('parcourir')->with('resultat', $resultat);
    }
}