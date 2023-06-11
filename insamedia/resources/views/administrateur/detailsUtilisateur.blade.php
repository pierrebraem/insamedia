@extends('layout.app')

@section('content')
    <div class="container">
        <div class="card" style="margin-top: 5px;">
            <div class="card-header">
                <h4 class="text-center">Informations</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        @if($utilisateur->photo == null)
                            <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfileA"/>
                        @else
                            <img src="{{ asset($utilisateur->photo) }}" class="photoProfileA"/>
                        @endif
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col">
                        <p>id : {{$utilisateur->id}}</p>
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col">
                        <p>Nom et prénom : {{$utilisateur->nom.' '.$utilisateur->prenom}}</p>
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col">
                        <p>Pseudo : {{$utilisateur->pseudo}}</p>
                    </div>
                </div>
                
                <div class="row pt-2">
                    <div class="col">
                        <p>Adresse mail : {{$utilisateur->email}}</p>
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col">
                        <p>Date de naissance : {{$utilisateur->datenaissance}}</p>
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col">
                        <button class="btn btn-primary" id="ouvrirModalModificationProfilAdmin">Modifier</button>
                        @if($checkBannissementEncours)
                            <button class="btn btn-danger" id="ouvrirModalBannir" disabled>Bannir</button>
                        @else
                            <button class="btn btn-danger" id="ouvrirModalBannir">Bannir</button>
                        @endif

                        @if($utilisateur->idrole == 3)
                            <button class="btn btn-warning" id="ouvrirModalModeration">Donner les droits de modération</button>
                        @else
                            <button class="btn btn-warning" id="ouvrirModalModeration">Retirer les droits de modération</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 5px;">
            <div class="card-header">
                <h4 class="text-center">Historique des bannissements</h4>
            </div>
            <div class="card-body">
                @if($bannissements->count() == 0)
                    <p class="text-center">Aucun bannissements enregistrés</p>
                @else
                    @foreach($bannissements as $bannissement)
                        <div class="row" style="border-bottom-style: solid;">
                            <div class="col">
                                <p>Raison : {{$bannissement->raison}}</p>
                            </div>
                            <div class="col">
                                <p>Date de fin : {{$bannissement->finban}} (UTC)</p>
                            </div>
                            <div class="col">
                                <button class="btn btn-danger ouvrirModalSuppressionAdmin" data-id="{{$bannissement->id}}"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <a href="/administrateur/utilisateurs" class="btn btn-primary" style="margin-top: 5px;">Retour</a>

        <!-- Modal modération -->
        <div id="modalModeration" class="modal">
            <div class="modal-contenu">
                <div class="modal-entete">
                    <span class="fermer"><button class="btn btn-danger">&times;</button></span>
                    @if($utilisateur->idrole == 3)
                        <h4>Donner les droits de modération</h4>
                    @else
                        <h4>Retirer les droits de modération</h4>
                    @endif
                </div>
                <div class="modal-corps">
                    <div>
                        <h4>Êtes-vous sur de vouloir @if($utilisateur->idrole == 3) donner @else retirer @endif les droits de modération à {{$utilisateur->pseudo}} ?</h4>
                    </div>
                    <div>
                        <button class="btn btn-danger fermerB">Non</button>
                        <a href="/administrateur/utilisateurs/{{$utilisateur->id}}/moderation" class="btn btn-success">Oui</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal bannir -->
        <div id="modalBannir" class="modal">
            <div class="modal-contenu">
                <div class="modal-entete">
                    <span class="fermer"><button class="btn btn-danger">&times;</button></span>
                    <h4>Bannir</h4>
                </div>
                <div class="modal-corps">
                    <form action="/administrateur/utilisateurs/{{$utilisateur->id}}/bannir" method="post">
                    @csrf
                        <div>
                            <label for="raison">Raison :</label>
                            <input type="text" placeholder="Raison" name="raison"/>
                        </div>

                        <div style="margin-top: 5px;">
                            <label for="date">Date de fin du bannissement</label>
                            <input type="date" name="date"/>
                        </div>

                        <input type="submit" class="btn btn-success" value="Bannir"/>
                    </form>
                    <button class="btn btn-danger fermerB">Annuler</button>
                </div>
            </div>
        </div>

        <!-- Modal suppression -->
        <div id="modalSuppressionAdmin" class="modal">
            <div class="modal-contenu">
                <div class="modal-entete">
                    <span class="fermer"><button class="btn btn-danger">&times;</button></span>
                    <h4>Suppression du bannissement</h4>
                </div>
                <div class="modal-corps">
                    <div>
                        <p>Etes-vous sur de vouloir supprimer le bannissement de {{$utilisateur->pseudo}}?</p>
                        <p>Une fois supprimer, le bannissement ne réapparaîtrera dans l'historique</p>
                    </div>
                    <div>
                        <button class="btn btn-danger fermerB">Non</button>
                        <a href="#" class="btn btn-success btn-suppression-admin">Oui</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal modification profil -->
        <div id="modalModicationProfilAdmin" class="modal">
            <div class="modal-contenu">
                <div class="modal-entete">
                    <span class="fermer"><button class="btn btn-danger">&times;</button></span>
                    <h4>Modification du profil de {{$utilisateur->pseudo}}</h4>
                </div>
                <div class="modal-corps">
                    <form action="/administrateur/utilisateurs/{{$utilisateur->id}}/modifier" method="post">
                    @csrf
                        <div>
                            <label for="nom">Nom :</label>
                            <input type="text" placeholder="Nom" name="nom" value="{{$utilisateur->nom}}"/>
                        </div>

                        <div style="margin-top: 5px;">
                            <label for="prenom">Prénom :</label>
                            <input type="text" placeholder="Prénom" name="prenom" value="{{$utilisateur->prenom}}"/>
                        </div>

                        <div style="margin-top: 5px;">
                            <label for="pseudo">Pseudo :</label>
                            <input type="text" placeholder="Pseudo" name="pseudo" value="{{$utilisateur->pseudo}}"/>
                        </div>

                        <div style="margin-top: 5px;">
                            <label for="email">Mail :</label>
                            <input type="mail" placeholder="Mail" name="email" value="{{$utilisateur->email}}"/>
                        </div>
                        <div style="margin-top: 5px;">
                            <label for="date">Date de naissance :</label>
                            <input type="date" name="date" value="{{$utilisateur->datenaissance}}"/>
                        </div>

                        <div style="margin-top: 5px;">
                            <button class="btn btn-danger fermerB">Annuler</button>
                            <input type="submit" class="btn btn-success" value="Valider"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection