<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

use DB;

class MessageController extends Controller
{
    public function obtenirListeDiscussions(Request $request){
        $premier = DB::table('message')->select('message.idcompter', 'compte.pseudo')->join('compte', 'message.idcompter', '=', 'compte.id')->where('idcompted', $request->session()->get('id'));
        return DB::table('message')->select('message.idcompted', 'compte.pseudo')->join('compte', 'message.idcompted', '=', 'compte.id')->where('idcompter', $request->session()->get('id'))->get();
    }

    public function afficherMessage(Request $request){
        $listeDiscussions = $this->obtenirListeDiscussions($request);
        return view('message')->with('listeDiscussions', $listeDiscussions);
    }
}