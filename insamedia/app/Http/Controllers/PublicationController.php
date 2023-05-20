<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Publication;

class PublicationController extends Controller
{
    public function publier(Request $request){
        $nouvellePublication = new Publication;

        $nouvellePublication->description = $request->input('publication');
        $nouvellePublication->date = Carbon::now();
        $nouvellePublication->idcompte = $request->session()->get('id');
        $nouvellePublication->idvisibilite = 1;

        $nouvellePublication->save();

        return back();
    }
}