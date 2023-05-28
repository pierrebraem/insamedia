<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'nom' => ['required', 'string', 'min:1', 'max:50'],
            'prenom' => ['required', 'string', 'min:1', 'max:50'],
            'pseudo' => ['required', 'string', 'min:1', 'max:50'],
            'description' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif']
        ]);

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('avatars', 'avatar-'.$id.'.'.$extension);
        }

        Utilisateur::where('id', $id)->update(['nom' => $request->input('nom'), 'prenom' => $request->input('prenom'), 'pseudo' => $request->input('pseudo'), 'description' => $request->input('description'), 'photo' => 'avatars/'.'avatar-'.$id.'.'.$extension]);

        return back();
    }
}