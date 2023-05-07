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
                            <a class="btn btn-danger boutonP" href="#"><i class="fa-solid fa-xmark"></i></a>
                        @elseif($receveurAmi !== null)
                            <a class="btn btn-success boutonP" href="{{$utilisateur->id}}/accepter"><i class="fa-solid fa-check"></i></a>
                            <a class="btn btn-danger boutonP" href="{{$utilisateur->id}}/refuser"><i class="fa-solid fa-xmark"></i></a>
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
                                    @if($ami->receveur->photo === null)
                                        <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfile"/>
                                    @else
                                        <img src="{{ asset($ami->receveur->photo) }}" class="photoProfile"/>
                                    @endif
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
                    <div class="ligneE">
                        <div class="colonneE1">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                        </div>
                        <div class="colonneE2">
                            <textarea class="w-100" rows="5" placeholder="Dites ce que vous voulez"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-warning">Joindre un fichier</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-primary elementDroite">Publier</button>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
@endsection