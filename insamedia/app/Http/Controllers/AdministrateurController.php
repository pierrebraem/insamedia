<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\Utilisateur;
use App\Models\Publication;
use App\Models\Bannissement;
use App\Models\Signalement;

use DB;

class AdministrateurController extends Controller
{
    public function afficherAdministrateur(Request $request){
        return view('administrateur/accueil');
    }

    /* =============================================Partie gestion utilisateurs============================================ */
    public function afficherUtilisateurs(Request $request){
        $utilisateurs = Utilisateur::whereNot('id', $request->session()->get('id'))->get();
        return view('administrateur/gestionUtilisateurs')->with('utilisateurs', $utilisateurs);
    }

    public function detailsUtilisateur(Request $request, $id){
        $id = intval($id);
        $utilisateur = Utilisateur::firstWhere('id', $id);
        $bannissements = Bannissement::where('idcompte', $id)->get();
         return view('administrateur/detailsUtilisateur')->with('utilisateur', $utilisateur)
                                                        ->with('bannissements', $bannissements)
                                                        ->with('checkBannissementEncours', $this->checkBannissementEnCours($id));
    }

    public function attribuerRetirerDroit(Request $request, $id){
        $id = intval($id);
        $checkRole = Utilisateur::where('id', $id)->first('idrole');
        if($checkRole->idrole == 3){
            Utilisateur::where('id', $id)->update(['idrole' => 2]);
        }
        else{
            Utilisateur::where('id', $id)->update(['idrole' => 3]);
        }

        return back();
    }

    public function modificationProfilAdmin(Request $request, $id){
        $id = intval($id);
        $start_at = Carbon::now()->subYears(13);
        $request->validate([
            'nom' => ['required', 'string', 'min:1', 'max:50'],
            'prenom' => ['required', 'string', 'min:1', 'max:50'],
            'pseudo' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'min:1', 'max:255'],
            'date' => ['required', 'date', 'before:'.$start_at] 
        ]);

        Utilisateur::where('id', $id)->update(['nom' => $request->input('nom'), 'prenom' => $request->input('prenom'), 'pseudo' => $request->input('pseudo'), 'email' => $request->input('email'), 'datenaissance' => $request->input('date')]);

        return back();
    }

    public function bannissement(Request $request, $id){
        $id = intval($id);

        $request->validate([
            'raison' => ['required', 'string', 'min:1', 'max:255'],
            'date' => ['required', 'date', 'after:now']
        ]);

        $nouveauBannissement = new Bannissement;
        $nouveauBannissement->raison = $request->input('raison');
        $nouveauBannissement->finban = $request->input('date').' '.Carbon::now()->format('H:i:s');
        $nouveauBannissement->idcompte = $id;
        $nouveauBannissement->save();

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
        $id = intval($id);
        Bannissement::where('id', $id)->delete();
        return back();
    }

    public function checkBannissementEnCours($id){
        if(Bannissement::where('finban', '>=', Carbon::now())->where('idcompte', $id)->count() !== 0){
            return true;
        }
        return false;
    }

    /* =============================================Partie gestion signalements============================================ */
    public function afficherSignalements(Request $request){
        $signalements = DB::table('signalement')
                                ->select('publication.id as idPublication', 'publication.description as description', DB::raw('count(signalement.idpublication) as nombrePublication'))
                                ->join('publication', 'signalement.idpublication', '=', 'publication.id')
                                ->groupBy('idPublication')
                                ->get();
        return view('administrateur/gestionSignalements')->with('signalements', $signalements);
    }

    public function detailsSignalement(Request $request, $id){
        $id = intval($id);
        $publication = Publication::where('id', $id)->first();
        $signalements = Signalement::where('idpublication', $id)->get();
        if($publication->urlcontenu != null){
            $publication->extension = explode('.', $publication->urlcontenu)[1];
        }
        return view('administrateur/detailsSignalement')->with('publication', $publication)
                                                            ->with('signalements', $signalements);
    }

    public function garderSignalement(Request $request, $id){
        $id = intval($id);
        Signalement::where('idpublication', $id)->delete();
        return redirect('/administrateur/signalements');
    }

    public function supprimerSignalement(Request $request, $id){
        $id = intval($id);
        Signalement::where('idpublication', $id)->delete();
        $publication = Publication::where('id', $id)->first();
        if($publication->urlcontenu !== null){
            Storage::disk('public')->delete($publication->urlcontenu);
        }
        $publication->delete();
        return redirect('/administrateur/signalements');
    }

    public function ajouterSignalement(Request $request, $id){
        $id = intval($id);
        $request->validate([
            'raison' => ['required', 'string', 'min:1', 'max:255']
        ]);

        $nouveauSignalement = new Signalement;
        $nouveauSignalement->raison = $request->input('raison');
        $nouveauSignalement->idcompte = $request->session()->get('id');
        $nouveauSignalement->idpublication = $id;
        $nouveauSignalement->save();
        return back();
    }
}
