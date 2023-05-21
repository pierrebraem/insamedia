<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ConnexionInscriptionController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PublicationController;

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

Route::get('/', [AccueilController::class, 'afficherAccueil'])->name('accueil.afficher');

Route::get('/parcourir', function() {
    return view('parcourir');
});

Route::get('/connexion', [ConnexionInscriptionController::class, 'afficherConnexion'])->name('connexion.afficher');
Route::post('/connexion/seconnecter', [ConnexionInscriptionController::class, 'seconnecter'])->name('connexion.seconnecter');

Route::get('/inscription', [ConnexionInscriptionController::class, 'afficherInscription'])->name('inscription.afficher');
Route::post('/inscription/sincrire', [ConnexionInscriptionController::class, 'sincrire'])->name('inscription.sincrire');

Route::get('/deconnexion', [ConnexionInscriptionController::class, 'deconnexion'])->name('deconnexion');

Route::get('/profils/{id}', [UtilisateurController::class, 'afficherProfil'])->name('profil.afficher');
Route::get('/profils/{id}/ajouter', [UtilisateurController::class, 'ajouterAmis'])->name('profil.ajouter');
Route::get('/profils/{id}/accepter', [UtilisateurController::class, 'accepterAmis'])->name('profil.accepter');
Route::get('/profils/{id}/refuser', [UtilisateurController::class, 'supprimerAmis'])->name('profil.refuser');
Route::get('/profils/{id}/annuler', [UtilisateurController::class, 'supprimerAmis'])->name('profil.annuler');
Route::get('/profils/{id}/supprimer', [UtilisateurController::class, 'supprimerAmis'])->name('profil.supprimer');

Route::get('/notifications', [NotificationController::class, 'afficherNotification'])->name('notification.afficher');

Route::post('/publication/publier', [PublicationController::class, 'publier'])->name('publication.publier');
Route::get('/publication/aimer/{id}', [PublicationController::class, 'aimer'])->name('publication.aimer');
Route::get('/publication/commentaire/{id}', [PublicationController::class, 'commentaire'])->name('publication.commentaire');