<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilisateur;


class ParcourirController extends Controller
{
    public function afficherParcourir(){
        return view('parcourir')->with('resultat', null);
    }

    public function rechercher(Request $request){
        $request->validate([
            'recherche' => ['required', 'string', 'min:1', 'max:255']
        ]);

        $resultat = Utilisateur::where('pseudo', 'LIKE', '%'.$request->input('recherche').'%')->get();
        return view('parcourir')->with('resultat', $resultat);
    }
}