<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Models\Utilisateur;
use App\Models\Publication;
use App\Models\Commentaire;
use App\Models\Aimer;
use App\Models\Message;
use App\Models\Amis;
use App\Models\Notification;
use App\Models\Signalement;
use App\Models\Bannissement;

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
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif', 'dimensions:max_width=222,max_height=222']
        ]);

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('avatars', 'avatar-'.$id.'.'.$extension);
            $lien = 'avatars/'.'avatar-'.$id.'.'.$extension;
            $request->session()->put('photo', $lien);
        }

        Utilisateur::where('id', $id)->update(['nom' => $request->input('nom'), 'prenom' => $request->input('prenom'), 'pseudo' => $request->input('pseudo'), 'description' => $request->input('description'), 'photo' => $lien]);

        return back();
    }

    public function supprimerCompte(Request $request, $id){
        $id = intval($id);
        if(Utilisateur::where('id', $request->session()->get('id'))->first() !== null){
            /* Suppression des publications */
            $publications = Publication::where('idcompte', $request->session()->get('id'))->orWhere('idprofil', $request->session()->get('id'))->get('id');
            foreach($publications as $publication){
                $idPublication = intval($publication->id);
                Commentaire::destroy($idPublication);
                Aimer::destroy($idPublication);
                Signalement::destroy($idPublication);
                $publication->delete();
            }

            /* Suppression des aimes */
            Aimer::where('idcompte', $request->session()->get('id'))->delete();

            /* Suppression des commentaires */
            Commentaire::where('idcompte', $request->session()->get('id'))->delete();

            /* Suppression des messages */
            Message::where('idcompted', $request->session()->get('id'))->orWhere('idcompter', $request->session()->get('id'))->delete();

            /* Suppression des amis */
            Amis::where('idcompted', $request->session()->get('id'))->orWhere('idcompter', $request->session()->get('id'))->delete();

            /* Suppression des notifications */
            Notification::where('idcompter', $request->session()->get('id'))->orWhere('idcompteo', $request->session()->get('id'))->delete();

            /* Suppression des signalements */
            Signalement::where('idcompte', $request->session()->get('id'))->delete();

            /* Suppression des bannissements */
            Bannissement::where('idcompte', $request->session()->get('id'))->delete();

            /* Suppression des fichiers */
            if(Storage::disk('public')->exists($request->session()->get('id'))){
                Storage::disk('public')->deleteDirectory($request->session()->get('id'));
            }

            if(Storage::disk('public')->exists('/avatars/avatar-'.$request->session()->get('id').'.png')){
                Storage::disk('public')->delete('/avatars/avatar-'.$request->session()->get('id').'.png');
            }

            /* Suppression du compte */
            Utilisateur::where('id', $request->session()->get('id'))->delete();

            /* Réinitialisation de la session */
            $request->session()->flush();

            return redirect('/');
        }
        return back();
    }
}