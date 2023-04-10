<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

use App\Models\Utilisateur;

class ConnexionInscriptionController extends Controller
{
    public function afficherConnexion(){
        return view('accueilN');
    }

    public function afficherInscription(){
        return view('inscription');
    }

    public function sincrire(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'min:1', 'max:50'],
            'prenom' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'min:1', 'max:255'],
            'datenaissance' => ['required', 'date'],
            'pseudo' => ['required', 'string', 'min:1', 'max:50'],
            'mdp' => ['required', 'string', 'min:1', 'max:50'],
            'mdpC' => ['required', 'string', 'min:1', 'max:50'],
        ]);

        $nouvelUtilisateur = new Utilisateur;
        
        if(Utilisateur::where('email', $request->input('email'))->value('email') != ''){
            return back()->withErrors(['Message' => 'L\'adresse email existe déjà']);
        }
        else{
            $nouvelUtilisateur->email = $request->input('email');
        }

        if($request->input('mdp') != $request->input('mdpC')){
            return back()->withErrors(['Message' => 'Les champs \'Mot de passe\' et \'Confirmer le mot de passe\' ne sont pas identiques']);
        }
        else{
            $nouvelUtilisateur->mdp = Hash::make($request->input('mdp'));
        }

        $nouvelUtilisateur->nom = $request->input('nom');
        $nouvelUtilisateur->prenom = $request->input('prenom');
        $nouvelUtilisateur->email = $request->input('email');
        $nouvelUtilisateur->datenaissance = $request->input('datenaissance');
        $nouvelUtilisateur->pseudo = $request->input('pseudo');
        $nouvelUtilisateur->mdp = $request->input('mdp');
        $nouvelUtilisateur->idrole = 3;
        $nouvelUtilisateur->save();

        return redirect('/connexion')->with('message', 'Votre compte a était créé avec succès');
    }
}
