<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Message;

use DB;

class MessageController extends Controller
{
    public function obtenirListeDiscussions(Request $request){
        $premier = DB::table('message')->select('message.idcompter as id', 'compte.pseudo as pseudo', 'compte.photo as photo')->distinct()->join('compte', 'message.idcompter', '=', 'compte.id')->where('idcompted', $request->session()->get('id'));
        return DB::table('message')->select('message.idcompted as id', 'compte.pseudo as pseudo', 'compte.photo as photo')->distinct()->join('compte', 'message.idcompted', '=', 'compte.id')->where('idcompter', $request->session()->get('id'))->union($premier)->get();
    }

    public function obtenirMessages(Request $request, $id){
        if($id == null){
            return;
        }
        $id = intval($id);
        return Message::where('idcompted', $request->session()->get('id'))->where('idcompter', $id)->orWhere('idcompted', $id)->where('idcompter', $request->session()->get('id'))->orderBy('date', 'asc')->get();
    }

    public function afficherMessage(Request $request, $id = null){
        $listeDiscussions = $this->obtenirListeDiscussions($request);
        $messages = $this->obtenirMessages($request, $id);
        return view('message')->with('listeDiscussions', $listeDiscussions)
                            ->with('id', $id)
                            ->with('messages', $messages);
    }

    public function envoyerMessage(Request $request, $id){
        $id = intval($id);
        $nouveauMessage = new Message;
        $nouveauMessage->idcompted = $request->session()->get('id');
        $nouveauMessage->idcompter = $id;
        $nouveauMessage->contenu = $request->input('message');
        $nouveauMessage->date = Carbon::now();

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

            $debutLien = $request->session()->get('id').$dossier.'/';
            $finLien = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 32).'.'.$extension;
            $request->file('fichier')->move($debutLien, $finLien);
            $nouveauMessage->urlcontenu = $debutLien.$finLien;
        }

        $nouveauMessage->save();

        return back();
    }
}