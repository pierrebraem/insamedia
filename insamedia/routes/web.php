<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConnexionInscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('accueilC');
});

Route::get('/parcourir', function() {
    return view('parcourir');
});

Route::get('/connexion', [ConnexionInscriptionController::class, 'afficherConnexion'])->name('connexion.afficher');
Route::post('/connexion/seconnecter', [ConnexionInscriptionController::class, 'seconnecter'])->name('connexion.seconnecter');

Route::get('/inscription', [ConnexionInscriptionController::class, 'afficherInscription'])->name('inscription.afficher');
Route::post('/inscription/sincrire', [ConnexionInscriptionController::class, 'sincrire'])->name('inscription.sincrire');