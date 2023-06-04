<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Message;

use DB;

class MessageController extends Controller
{
    public function obtenirListeDiscussions(Request $request){
        $premier = DB::table('message')->select('message.idcompter as id', 'compte.pseudo')->join('compte', 'message.idcompter', '=', 'compte.id')->where('idcompted', $request->session()->get('id'));
        return DB::table('message')->select('message.idcompted as id', 'compte.pseudo')->join('compte', 'message.idcompted', '=', 'compte.id')->where('idcompter', $request->session()->get('id'))->get();
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
        $nouveauMessage->save();

        return back();
    }
}