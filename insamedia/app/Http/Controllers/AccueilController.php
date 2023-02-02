<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function afficherAccueil(Request $request){
        if(!$request->session()->get('id')){
            return redirect('/connexion');
        }
        return view('accueilC');
    }
}
