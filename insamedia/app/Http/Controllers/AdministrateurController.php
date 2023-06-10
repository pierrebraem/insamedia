<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    public function afficherAdministrateur(Request $request){
        if($request->session()->get('id') != 3){
            return view('administrateur/accueil');
        }
        return back();
    }
}
