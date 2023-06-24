<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\VerifieBannissement;
use App\Http\Middleware\VerifieAdministrateur;
use App\Http\Middleware\NombreNotifs;

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

Route::get('/banni', [AdministrateurController::class, 'afficherBannissement'])->name('bannissement.afficher')->middleware(NombreNotifs::class);
Route::get('/banni/{id}/modifier', [AdministrateurController::class, 'modifierBannissement'])->name('bannissement.modifier')->middleware(NombreNotifs::class);
Route::get('/banni/{id}/supprimer', [AdministrateurController::class, 'supprimerBannissement'])->name('bannissement.supprimer')->middleware(NombreNotifs::class);

Route::get('/', [AccueilController::class, 'afficherAccueil'])->name('accueil.afficher')->middleware(NombreNotifs::class);

Route::get('/parcourir', [ParcourirController::class, 'afficherParcourir'])->name('parcourir.afficher')->middleware(NombreNotifs::class);
Route::post('/parcourir/recherche', [ParcourirController::class, 'rechercher'])->name('parcourir.rechercher')->middleware(NombreNotifs::class);

Route::get('/connexion', [ConnexionInscriptionController::class, 'afficherConnexion'])->name('connexion.afficher');
Route::post('/connexion/seconnecter', [ConnexionInscriptionController::class, 'seconnecter'])->name('connexion.seconnecter');

Route::get('/inscription', [ConnexionInscriptionController::class, 'afficherInscription'])->name('inscription.afficher');
Route::post('/inscription/sincrire', [ConnexionInscriptionController::class, 'sincrire'])->name('inscription.sincrire');

Route::get('/deconnexion', [ConnexionInscriptionController::class, 'deconnexion'])->name('deconnexion');

Route::get('/profils/{id}', [UtilisateurController::class, 'afficherProfil'])->name('profil.afficher')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/ajouter', [UtilisateurController::class, 'ajouterAmis'])->name('profil.ajouter')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/accepter', [UtilisateurController::class, 'accepterAmis'])->name('profil.accepter')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/refuser', [UtilisateurController::class, 'supprimerAmis'])->name('profil.refuser')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/annuler', [UtilisateurController::class, 'supprimerAmis'])->name('profil.annuler')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/supprimer', [UtilisateurController::class, 'supprimerAmis'])->name('profil.supprimer')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/bloquer', [UtilisateurController::class, 'bloquer'])->name('profil.bloquer')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/profils/{id}/debloquer', [UtilisateurController::class, 'debloquer'])->name('profil.debloquer')->middleware(VerifieBannissement::class, NombreNotifs::class);

Route::get('/notifications', [NotificationController::class, 'afficherNotification'])->name('notification.afficher')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/notifications/redirect/{id}', [NotificationController::class, 'redirect'])->name('notification.redirect')->middleware(VerifieBannissement::class, NombreNotifs::class);

Route::get('/publication/{id}', [PublicationController::class, 'afficher'])->name('publication.afficher')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::post('/publication/{id}/publier', [PublicationController::class, 'publier'])->name('publication.publier')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/publication/{id}/aimer', [PublicationController::class, 'aimer'])->name('publication.aimer')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/publication/{id}/commentaire', [PublicationController::class, 'commentaire'])->name('publication.commentaire')->middleware(VerifieBannissement::class, NombreNotifs::class);

Route::get('/message', [MessageController::class, 'afficherMessage'])->name('message.afficher')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::get('/message/{id}', [MessageController::class, 'afficherMessage'])->name('message.afficher')->middleware(VerifieBannissement::class, NombreNotifs::class);
Route::post('/message/envoyer/{id}', [MessageController::class, 'envoyerMessage'])->name('message.envoyer')->middleware(VerifieBannissement::class, NombreNotifs::class);

Route::get('/parametre/{id}', [ParametreController::class, 'afficherParametre'])->name('parametre.afficher')->middleware(NombreNotifs::class);
Route::post('/parametre/modifProfil', [ParametreController::class, 'modifProfil'])->name('parametre.modifProfil')->middleware(NombreNotifs::class);
Route::get('/parametre/{id}/supprimer', [ParametreController::class, 'supprimerCompte'])->name('parametre.supprimerCompte')->middleware(NombreNotifs::class);

Route::get('/administrateur', [AdministrateurController::class, 'afficherAdministrateur'])->name('administrateur.afficher')->middleware(VerifieAdministrateur::class);

Route::get('/administrateur/utilisateurs', [AdministrateurController::class, 'afficherUtilisateurs'])->name('administrateur.utilisateur.afficher')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::get('/administrateur/utilisateurs/{id}', [AdministrateurController::class, 'detailsUtilisateur'])->name('administrateur.utilisateur.details')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::post('/administrateur/utilisateurs/{id}/modifier', [AdministrateurController::class, 'modificationProfilAdmin'])->name('administrateur.utilisateur.modifier')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::get('/administrateur/utilisateurs/{id}/moderation', [AdministrateurController::class, 'attribuerRetirerDroit'])->name('administrateur.utilisateur.moderation')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::post('/administrateur/utilisateurs/{id}/bannir', [AdministrateurController::class, 'bannissement'])->name('administrateur.utilisateur.bannir')->middleware(VerifieAdministrateur::class, NombreNotifs::class);

Route::get('/administrateur/signalements', [AdministrateurController::class, 'afficherSignalements'])->name('administrateur.signalement.afficher')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::get('/administrateur/signalements/{id}', [AdministrateurController::class, 'detailsSignalement'])->name('administrateur.signalement.details')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::get('/administrateur/signalements/{id}/garder', [AdministrateurController::class, 'garderSignalement'])->name('administrateur.signalement.garder')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::get('/administrateur/signalements/{id}/supprimer', [AdministrateurController::class, 'supprimerSignalement'])->name('administrateur.signalement.supprimer')->middleware(VerifieAdministrateur::class, NombreNotifs::class);
Route::post('/administrateur/signalements/{id}/ajouter', [AdministrateurController::class, 'ajouterSignalement'])->name('administrateur.signalement.ajouter')->middleware(VerifieBannissement::class, NombreNotifs::class);