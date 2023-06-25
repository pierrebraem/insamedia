<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;

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
        $start_at = Carbon::now()->subYears(13);
        $request->validate([
            'nom' => ['required', 'string', 'min:1', 'max:50'],
            'prenom' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'min:1', 'max:255'],
            'datenaissance' => ['required', 'date', 'before:'.$start_at],
            'pseudo' => ['required', 'string', 'min:1', 'max:50'],
            'mdp' => ['required', 'string', 'min:6', 'max:50'],
            'mdpC' => ['required', 'string', 'min:6', 'max:50'],
        ]);

        $nouvelUtilisateur = new Utilisateur;
        
        if(Utilisateur::where('email', $request->input('email'))->value('email') != ''){
            return back()->withErrors(['message' => 'L\'adresse email existe déjà']);
        }
        else{
            $nouvelUtilisateur->email = $request->input('email');
        }

        if($request->input('mdp') != $request->input('mdpC')){
            return back()->withErrors(['message' => 'Les champs \'Mot de passe\' et \'Confirmer le mot de passe\' ne sont pas identiques']);
        }
        else{
            $nouvelUtilisateur->mdp = Hash::make($request->input('mdp'));
        }

        if(Utilisateur::where('pseudo', $request->input('pseudo'))->value('pseudo') != ''){
            return back()->withErrors(['message' => 'Le pseudo saisi existe déjà']);
        }
        else{
            $nouvelUtilisateur->pseudo = $request->input('pseudo');
        }

        $nouvelUtilisateur->nom = $request->input('nom');
        $nouvelUtilisateur->prenom = $request->input('prenom');
        $nouvelUtilisateur->email = $request->input('email');
        $nouvelUtilisateur->datenaissance = $request->input('datenaissance');
        $nouvelUtilisateur->idrole = 3;
        $nouvelUtilisateur->save();

        return redirect('/connexion')->with('message', 'Votre compte a était créé avec succès');
    }

    public function seconnecter(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'min:1', 'max:255'],
            'mdp' => ['required', 'string', 'min:1', 'max:50'],
        ]);

        if(Utilisateur::where('email', $request->input('email'))->value('email') == '' || !Hash::check($request->input('mdp'), Utilisateur::where('email', $request->input('email'))->value('mdp'))){
            return back()->withErrors(['message' => 'L\'adresse email ou le mot de passe sont incorrects']);
        }
        else{
            $utilisateur = Utilisateur::where('email', $request->input('email'));
            $request->session()->put('id', $utilisateur->value('id'));
            $request->session()->put('photo', $utilisateur->value('photo'));
            $request->session()->put('email', $utilisateur->value('email'));
            $request->session()->put('role', $utilisateur->value('idrole'));
        }
        return redirect('/');
    }

    public function deconnexion(Request $request){
        $request->session()->flush();

        return redirect('/');
    }
}
