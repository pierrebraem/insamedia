<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Utilisateur;
use App\Models\Bannissement;

class AdministrateurController extends Controller
{
    public function afficherAdministrateur(Request $request){
        if($request->session()->get('role') != 3){
            return view('administrateur/accueil');
        }
        return back();
    }

    public function afficherUtilisateurs(Request $request){
        if($request->session()->get('role') != 3){
            $utilisateurs = Utilisateur::whereNot('id', $request->session()->get('id'))->get();
            return view('administrateur/gestionUtilisateurs')->with('utilisateurs', $utilisateurs);
        }
        return back();
    }

    public function detailsUtilisateur(Request $request, $id){
        if($request->session()->get('role') != 3){
            $id = intval($id);
            $utilisateur = Utilisateur::firstWhere('id', $id);
            $bannissements = Bannissement::where('idcompte', $id)->get();
            return view('administrateur/detailsUtilisateur')->with('utilisateur', $utilisateur)
                                                            ->with('bannissements', $bannissements)
                                                            ->with('checkBannissementEncours', $this->checkBannissementEnCours($id));
        }
        return back();
    }

    public function attribuerRetirerDroit(Request $request, $id){
        if($request->session()->get('role') != 3){
            $id = intval($id);
            $checkRole = Utilisateur::where('id', $id)->first('idrole');
            if($checkRole->idrole == 3){
                Utilisateur::where('id', $id)->update(['idrole' => 2]);
            }
            else{
                Utilisateur::where('id', $id)->update(['idrole' => 3]);
            }
        }
        return back();
    }

    public function modificationProfilAdmin(Request $request, $id){
        if($request->session()->get('role') != 3){
            $id = intval($id);
            $request->validate([
                'nom' => ['required', 'string', 'min:1', 'max:50'],
                'prenom' => ['required', 'string', 'min:1', 'max:50'],
                'pseudo' => ['required', 'string', 'min:1', 'max:50'],
                'email' => ['required', 'string', 'min:1', 'max:255'],
                'date' => ['required', 'date'] 
            ]);

            Utilisateur::where('id', $id)->update(['nom' => $request->input('nom'), 'prenom' => $request->input('prenom'), 'pseudo' => $request->input('pseudo'), 'email' => $request->input('email'), 'datenaissance' => $request->input('date')]);
        }

        return back();
    }

    public function bannissement(Request $request, $id){
        if($request->session()->get('role') != 3){
            $id = intval($id);

            $nouveauBannissement = new Bannissement;
            $nouveauBannissement->raison = $request->input('raison');
            $nouveauBannissement->finban = $request->input('date').' '.Carbon::now()->format('H:i:s');
            $nouveauBannissement->idcompte = $id;
            $nouveauBannissement->save();
        }
        return back();
    }

    public function afficherBannissement(Request $request){
        $banni = Bannissement::where('idcompte', $request->session()->get('id'));
        if($banni->count() != 0){
            return view('banni')->with('bannissement', $banni->get()[0]);
        }
        return back();
    }

    public function supprimerBannissement(Request $request, $id){
        if($request->session()->get('id') != 3){
            $id = intval($id);
            Bannissement::where('id', $id)->delete();
        }
        return back();
    }

    public function checkBannissementEnCours($id){
        if(Bannissement::where('finban', '>=', Carbon::now())->where('idcompte', $id)->count() !== 0){
            return true;
        }
        return false;
    }
}
