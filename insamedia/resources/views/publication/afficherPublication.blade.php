@extends('layout.app')

@section('content')
    <div class="container">
        @if($publication->autoriser)
            <div class="card centrer" style="margin-top: 5px;">
                <div class="card-body">
                    <div class="row w-50">
                        <div class="col-2">
                            @if($publication->compte->photo === null)
                                <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfile"/>
                            @else
                                <img src="{{ asset($publication->compte->photo) }}" class="photoProfile"/>
                            @endif
                        </div>
                        <div class="col-6 texteContenu">
                            <p>{{$publication->compte->pseudo}} - {{$publication->anciennete}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>{{$publication->description}}</p>
                            @if($publication->extension == 'jpg' || $publication->extension == 'jpeg' || $publication->extension == 'png' || $publication->extension == 'gif')
                                <img src="{{ asset($publication->urlcontenu) }}" class="photoPublication"/>
                            @elseif($publication->extension == 'mp4')
                                <video width="500" heigth="500" controls>
                                    <source src="{{ asset($publication->urlcontenu) }}">
                                </video>
                            @elseif($publication->extension == 'mp3')
                                <audio controls src="{{ asset($publication->urlcontenu) }}">
                            @elseif($publication->urlcontenu != null)
                                <a href="{{ asset($publication->urlcontenu) }}" download>Télécharger fichier</a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/publication/{{$publication->id}}/aimer" class="supprimerLien">
                                @if($publication->aimeDeja)
                                    <i class="fa-solid fa-heart"></i>
                                @else
                                    <i class="fa-regular fa-heart"></i>
                                @endif
                            </a>
                            <span class="badge bg-danger round-pill" style="margin-right: 10px;">{{$publication->aimer}}</span>

                            <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
                                    
                            <i class="fa-regular fa-flag ouvrirModalSignalement" data-id="{{$publication->id}}"></i>
                        </div>
                    </div>
                </div>
            </div>

            @if($publication->aCommentaire === 1)
                <div class="card carteCommentaireP centrer">
                    <div class="card-body">
                        <p>Commentaires {{$publication->commentaires->count()}}</p>
                        <!-- Affichage commentaire -->
                        @foreach($publication->commentaires as $commentaire)
                            <div class="unCommentaire">
                                <div class="contenuCommentaire">
                                    <div class="row">
                                        <div class="col-1">
                                            @if($commentaire->compte->photo === null)
                                                <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfile"/>
                                            @else
                                                <img src="{{ asset($commentaire->compte->photo) }}" class="photoProfile"/>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-head texteContenu">
                                                    {{$commentaire->compte->pseudo}}
                                                </div>
                                                <div class="card-body">
                                                    {{$commentaire->commentaire}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1"></div>
                                            <div class="col">
                                                <i class="fa-regular fa-heart"></i>
                                                    <span class="badge bg-danger round-pill" style="margin-right: 10px;">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if(Session::has('id'))
                                <form action="/publication/{{$publication->id}}/commentaire" method="get">
                                    <div class="ligneE">
                                        <div class="colonneE1">
                                            @if(Session::get('photo') == null)
                                                <a href="/profils/{{Session::get('id')}}"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                                            @else
                                                <a href="/profils/{{Session::get('id')}}"><img class="photoProfile elementDroite" src="{{ asset( Session::get('photo') ) }}"/></a>
                                            @endif
                                        </div>
                                        <div class="colonneE2">
                                            <textarea class="w-100" rows="2" placeholder="Écrivez un commentaire" name="commentaire"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-primary elementDroite" value="Publier"/>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    @else
                    <div class="card carteCommentaireP centrer text-center">
                        <div class="card-body">
                            <p>Les commentaires sur cette publication sont désactivés.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Modal Signalement -->
            <div id="modalSignalement" class="modal">
                <div class="modal-contenu">
                    <div class="modal-entete">
                        <span class="fermer"><button class="btn btn-danger">&times;</button></span>
                        <h4>Signalement</h4>
                    </div>
                    <div class="modal-corps">
                        <form class="form-signalement" method="post">
                        @csrf
                            <div>
                                <label for="raison">Raison :</label>
                                <input type="text" placeholder="Raison" name="raison"/>
                            </div>
                            <div>
                                <button type="button" class="btn btn-danger fermerB">Annuler</button>
                                <input type="submit" class="btn btn-success" value="Signaler"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <h2 class="text-center">Vous n'êtes pas autoriser à voir cette publication</h2>
        @endif
    </div>
@endsection