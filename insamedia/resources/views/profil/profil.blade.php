@extends('layout.app')

@section('content')
    <div class="containerP">
        <!-- Section présentation -->
        <div class="section">
            <img id="banniere" src="{{ asset('images/banniereTest.jpg') }}" alt="banniere"/>
            <div class="alignementPseudo">
                @if($utilisateur->photo === null)
                    <img id="pp" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                @else
                    <img id="pp" src="{{ asset($utilisateur->photo) }}" />
                @endif
                <p id="pseudo">{{$utilisateur->pseudo}}</p>
                @if(Session::has('id'))
                    @if($utilisateur->id === Session::get('id'))
                        <a class="btn btn-primary boutonP" href="#"><i class="fa-solid fa-pen"></i></a>
                    @else
                        @if($demandeurAmi !== null)
                            <a class="btn btn-danger boutonP" href="{{$utilisateur->id}}/annuler"><i class="fa-solid fa-xmark"></i></a>
                        @elseif($receveurAmi !== null)
                            <a class="btn btn-success boutonP" href="{{$utilisateur->id}}/accepter"><i class="fa-solid fa-check"></i></a>
                            <a class="btn btn-danger boutonP" href="{{$utilisateur->id}}/refuser"><i class="fa-solid fa-xmark"></i></a>
                        @elseif($estAmi)
                            <a class="btn btn-danger boutonP" href="{{$utilisateur->id}}/supprimer"><i class="fa-solid fa-minus"></i></a>
                        @else
                            <a class="btn btn-primary boutonP" href="{{$utilisateur->id}}/ajouter"><i class="fa-solid fa-plus"></i></a>
                        @endif
                    @endif
                @endif
            </div>
            @if($utilisateur->description === null)
                <p id="description">Aucune description disponible.</p>
            @else
                <p id="description">{{$utilisateur->description}}</p>
            @endif
        </div>

        <!-- Section amis -->
        <div class="section">
            <div class="card mt-2 mb-2">
                <h5 class="card-header">Amis - {{$amis->count()}}</h5>
                <div class="card-body">
                    <div class="resultat">
                        @foreach($amis as $ami)
                            @if($ami->attente === 0)
                                <div class="resultatCol">
                                    <a href="/profils/{{$ami->receveur->id}}">
                                    @if($ami->receveur->photo === null)
                                        <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfile"/>
                                    @else
                                        <img src="{{ asset($ami->receveur->photo) }}" class="photoProfile"/>
                                    @endif
                                    </a>
                                    <figcaption class="labelResultat">{{$ami->receveur->pseudo}}</figcaption>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Section publication -->
        <div>
            <!-- Carte pour publier du contenu -->
            <div class="card cartePublicationP centrer">
                <div class="card-body">
                    <form action="/publication/publier" method="post">
                    @csrf
                        <div class="ligneE">
                            <div class="colonneE1">
                                <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                            </div>
                            <div class="colonneE2">
                                <textarea class="w-100" rows="5" placeholder="Dites ce que vous voulez" name="publication"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <label>Visibilite</label>
                                <select name="visibilite">
                                    @foreach($visibilites as $visibilite)
                                        <option value="{{$visibilite->id}}">{{$visibilite->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <input type="checkbox" name="aCommentaire"/>
                                <label>Désactiver les commentaires</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-warning">Joindre un fichier</button>
                            </div>
                            <div class="col">
                                <input type="submit" class="btn btn-primary elementDroite" value="Publier"/>
                            </div>
                        </div>
                    </form>                
                </div>
            </div>

            <!-- Affichage publication sur le profil -->
            @if($publications->count() === 0)
                <h1 class="title text-center">Aucune publications sur ce profil</h1>
            @else
                @foreach($publications as $publication)
                    <div class="post">
                        <div class="card centrer">
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="/publication/aimer/{{$publication->id}}">
                                            @if($publication->aimeDeja)
                                                <i class="fa-solid fa-heart"></i>
                                            @else
                                                <i class="fa-regular fa-heart"></i>
                                            @endif
                                        </a>
                                        <span class="badge bg-danger round-pill" style="margin-right: 10px;">{{$publication->aimer}}</span>

                                        <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
                        
                                        <i class="fa-regular fa-flag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($publication->aCommentaire === 1)
                            <div class="card carteCommentaireP centrer">
                                <div class="card-body">
                                    <p>Commentaire 0</p>
                                    <form action="/publication/commentaire/{{$publication->id}}" method="get">
                                        <div class="ligneE">
                                            <div class="colonneE1">
                                                <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
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
                @endforeach
            @endif
        </div>
    </div>
@endsection