@extends('layout.app')

@section('content')
<div class="container">
    <!-- Carte recherche -->
    <div class="card mt-4 text-center">
        <h5 class="card-header">Rechercher</h5>
        <div class="card-body">
            <form action="/parcourir/recherche" method="post">
            @csrf
                <p>Rechercher une personne, un post, une photo, une vidéo ou une musique.</p>
                <input class="form-control mb-2" type="search" placeholder="Rechercher" name="recherche"/>
                <button class="btn btn-dark"><i class="fa-solid fa-filter" id="rechercheFiltre"></i></button>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

    <!-- Carte profil -->
    <div class="card mt-5">
        @if($resultat == null)
            <h5 class="card-header">Profils - 0</h5>
            <div class="card-body"></div>
        @else
            <h5 class="card-header">Profils - {{$resultat->count()}}</h5>
            <div class="card-body">
                <div class="resultat">
                    @foreach($resultat as $unResultat)
                        <a href="/profils/{{$unResultat->id}}" class="supprimerLien">
                            <div class="resultatCol">
                                @if($unResultat->photo == null)
                                    <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfile"/>
                                @else
                                    <img src="{{ asset($unResultat->photo) }}" class="photoProfile"/>
                                @endif
                                <figcaption class="labelResultat">{{$unResultat->pseudo}}</figcaption>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- modal filtre -->
    <div id="modalFiltre" class="modal">
        <div class="modal-contenu">
            <div class="modal-entete">
                <span class="fermer"><button class="btn btn-danger">&times;</button></span>
                <h4>Rechercher</h4>
            </div>
            <div class="modal-corps">
                <div>
                    <h5>Type</h5>
                    <input type="checkbox" name="profil" checked/>
                    <label>Profil</label>

                    <input type="checkbox" name="post" checked/>
                    <label>Post</label>

                    <input type="checkbox" name="image" checked/>
                    <label>Image</label>

                    <input type="checkbox" name="video" checked/>
                    <label>Vidéo</label>

                    <input type="checkbox" name="audio" checked/>
                    <label>Audio</label>
                </div>
                <div>
                    <h5>Date de publication ou de création de profil</h5>
                    <input type="radio" name="moins1"/>
                    <label>Il y a moins d'un an</label>

                    <input type="radio" name="1a3"/>
                    <label>Entre 1 et 3 ans</label>

                    <input type="radio" name="3a5"/>
                    <label>Entre 3 et 5 ans</label>

                    <input type="radio" name="tous" checked/>
                    <label>Tous</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection