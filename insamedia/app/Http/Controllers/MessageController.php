<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;

class MessageController extends Controller
{
    public function afficherMessage(){
        return view('message');
    }
}