<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\VerifieBannissement;

use App\Http\Controllers\ConnexionInscriptionController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\ParcourirController;
use App\Http\Controllers\AdministrateurController;

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

Route::get('/banni', [AdministrateurController::class, 'afficherBannissement'])->name('bannissement.afficher');
Route::get('/banni/{id}/modifier', [AdministrateurController::class, 'modifierBannissement'])->name('bannissement.modifier');
Route::get('/banni/{id}/supprimer', [AdministrateurController::class, 'supprimerBannissement'])->name('bannissement.supprimer');

Route::get('/', [AccueilController::class, 'afficherAccueil'])->name('accueil.afficher');

Route::get('/parcourir', [ParcourirController::class, 'afficherParcourir'])->name('parcourir.afficher');
Route::post('/parcourir/recherche', [ParcourirController::class, 'rechercher'])->name('parcourir.rechercher');

Route::get('/connexion', [ConnexionInscriptionController::class, 'afficherConnexion'])->name('connexion.afficher');
Route::post('/connexion/seconnecter', [ConnexionInscriptionController::class, 'seconnecter'])->name('connexion.seconnecter');

Route::get('/inscription', [ConnexionInscriptionController::class, 'afficherInscription'])->name('inscription.afficher');
Route::post('/inscription/sincrire', [ConnexionInscriptionController::class, 'sincrire'])->name('inscription.sincrire');

Route::get('/deconnexion', [ConnexionInscriptionController::class, 'deconnexion'])->name('deconnexion');

Route::get('/profils/{id}', [UtilisateurController::class, 'afficherProfil'])->name('profil.afficher')->middleware(VerifieBannissement::class);
Route::get('/profils/{id}/ajouter', [UtilisateurController::class, 'ajouterAmis'])->name('profil.ajouter')->middleware(VerifieBannissement::class);
Route::get('/profils/{id}/accepter', [UtilisateurController::class, 'accepterAmis'])->name('profil.accepter')->middleware(VerifieBannissement::class);
Route::get('/profils/{id}/refuser', [UtilisateurController::class, 'supprimerAmis'])->name('profil.refuser')->middleware(VerifieBannissement::class);
Route::get('/profils/{id}/annuler', [UtilisateurController::class, 'supprimerAmis'])->name('profil.annuler')->middleware(VerifieBannissement::class);
Route::get('/profils/{id}/supprimer', [UtilisateurController::class, 'supprimerAmis'])->name('profil.supprimer')->middleware(VerifieBannissement::class);

Route::get('/notifications', [NotificationController::class, 'afficherNotification'])->name('notification.afficher')->middleware(VerifieBannissement::class);

Route::post('/publication/publier/{id}', [PublicationController::class, 'publier'])->name('publication.publier')->middleware(VerifieBannissement::class);
Route::get('/publication/aimer/{id}', [PublicationController::class, 'aimer'])->name('publication.aimer')->middleware(VerifieBannissement::class);
Route::get('/publication/commentaire/{id}', [PublicationController::class, 'commentaire'])->name('publication.commentaire')->middleware(VerifieBannissement::class);

Route::get('/message', [MessageController::class, 'afficherMessage'])->name('message.afficher')->middleware(VerifieBannissement::class);
Route::get('/message/{id}', [MessageController::class, 'afficherMessage'])->name('message.afficher')->middleware(VerifieBannissement::class);
Route::post('/message/envoyer/{id}', [MessageController::class, 'envoyerMessage'])->name('message.envoyer')->middleware(VerifieBannissement::class);

Route::get('/parametre/{id}', [ParametreController::class, 'afficherParametre'])->name('parametre.afficher')->middleware(VerifieBannissement::class);
Route::post('/parametre/modifProfil', [ParametreController::class, 'modifProfil'])->name('parametre.modifProfil')->middleware(VerifieBannissement::class);

Route::get('/administrateur', [AdministrateurController::class, 'afficherAdministrateur'])->name('administrateur.afficher');
Route::get('/administrateur/utilisateurs', [AdministrateurController::class, 'afficherUtilisateurs'])->name('administrateur.utilisateur.afficher');
Route::get('/administrateur/utilisateurs/{id}', [AdministrateurController::class, 'detailsUtilisateur'])->name('administrateur.utilisateur.details');
Route::post('/administrateur/utilisateurs/{id}/modifier', [AdministrateurController::class, 'modificationProfilAdmin'])->name('administrateur.utilisateur.modifier');
Route::get('/administrateur/utilisateurs/{id}/moderation', [AdministrateurController::class, 'attribuerRetirerDroit'])->name('administrateur.utilisateur.moderation');
Route::post('/administrateur/utilisateurs/{id}/bannir', [AdministrateurController::class, 'bannissement'])->name('administrateur.utilisateur.bannir');