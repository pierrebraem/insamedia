<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Controllers\UtilisateurController;

use App\Models\Message;

use DB;

class MessageController extends Controller
{
    /*
    * Fonction qui permet d'obtenir la liste des contacts
    */
    public function obtenirListeDiscussions(Request $request){
        $premier = DB::table('message')->select('message.idcompter as id', 'compte.pseudo as pseudo', 'compte.photo as photo')->distinct()->join('compte', 'message.idcompter', '=', 'compte.id')->where('idcompted', $request->session()->get('id'));
        return DB::table('message')->select('message.idcompted as id', 'compte.pseudo as pseudo', 'compte.photo as photo')->distinct()->join('compte', 'message.idcompted', '=', 'compte.id')->where('idcompter', $request->session()->get('id'))->union($premier)->get();
    }

    /*
    * Fonction qui permet d'obtenir la liste des messages d'un contact
    * Paramtère : l'id de l'utilisateur auquel on communique avec
    */
    public function obtenirMessages(Request $request, $id){
        if($id == null){
            return;
        }
        $id = intval($id);
        $messages = Message::where('idcompted', $request->session()->get('id'))->where('idcompter', $id)->orWhere('idcompted', $id)->where('idcompter', $request->session()->get('id'))->orderBy('date', 'asc')->get();

        foreach($messages as $message){
            if($message->urlcontenu != null){
                $message->extension = explode('.', $message->urlcontenu)[1];
            }
        }

        return $messages;
    }

    /*
    * Fonction qui permet d'afficher la page des messages
    * Paramètre : l'id de l'utilisateur qu'on souhaite communiquer avec
    * Variables dans la vue :
    * - listeDiscussions : liste des contact de l'utilisateur
    * - id : l'id de la discussion
    * - estBloqueur : Vérifie si on a bloqué cette utilisateur
    * - estBloque : Vérifie si l'utilisateur nous a bloqué
    * - messages : Liste des messages d'une discussion
    */
    public function afficherMessage(Request $request, $id = null){
        $listeDiscussions = $this->obtenirListeDiscussions($request);
        $messages = $this->obtenirMessages($request, $id);
        $estBloqueur = UtilisateurController::estBloqueur($request->session()->get('id'), $id);
        $estBloque = UtilisateurController::estBloque($request->session()->get('id'), $id);
        return view('message')->with('listeDiscussions', $listeDiscussions)
                            ->with('id', $id)
                            ->with('estBloqueur', $estBloqueur)
                            ->with('estBloque', $estBloque)
                            ->with('messages', $messages);
    }

    /*
    * Fonction qui permet d'envoyer un message
    * Paramètre : l'id de l'utilisateur qu'on souhaite lui envoyer le message
    */
    public function envoyerMessage(Request $request, $id){
        $id = intval($id);
        $request->validate([
            'message' => ['required', 'string', 'min:1', 'max:255']
        ]);

        $nouveauMessage = new Message;
        $nouveauMessage->idcompted = $request->session()->get('id');
        $nouveauMessage->idcompter = $id;
        $nouveauMessage->contenu = $request->input('message');
        $nouveauMessage->date = Carbon::now();

        /* Vérifie si il y a un fichier. Si oui, où l'enregistrer en fonction de son format */
        if($request->hasFile('fichier')){
            $extension = $request->file('fichier')->getClientOriginalExtension();

            if($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif'){
                $dossier = '/images';
            }
            else if($extension == 'mp4'){
                $dossier = '/videos';
            }
            else if($extension == 'mp3'){
                $dossier = '/audios';
            }
            else{
                $dossier = '/autres';
            }

            /* Le contenu est stocké dans le dossier public. Tous son contenus se situe dans un dossier auquel son nom est l'id de l'utilisateur */
            $debutLien = $request->session()->get('id').$dossier.'/';
            $finLien = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32).'.'.$extension;
            $request->file('fichier')->move($debutLien, $finLien);
            $nouveauMessage->urlcontenu = $debutLien.$finLien;
        }

        $nouveauMessage->save();

        return back();
    }
}