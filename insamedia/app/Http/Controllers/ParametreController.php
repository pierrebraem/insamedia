<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Utilisateur;

use App\Http\Controllers\UtilisateurController;

class ParametreController extends Controller
{
    public function afficherParametre(Request $request, $id){
        $id = intval($id);
        if($id === $request->session()->get('id')){
            $utilisateur = UtilisateurController::informationsUtilisateur($id);
            return view('parametre/parametre')->with('utilisateur', $utilisateur);
        }
        else{
            return view('parametre/parametreErreur');
        }
    }

    public function modifProfil(Request $request){
        $id = intval($request->session()->get('id'));

        Utilisateur::where('id', $id)->update(['nom' => $request->input('nom'), 'prenom' => $request->input('prenom'), 'pseudo' => $request->input('pseudo'), 'description' => $request->input('description')]);

        return back();
    }
}