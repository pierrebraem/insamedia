@extends('layout.app')

@section('content')
    <div id="container">
        <!-- Carte pour publier du contenu -->
        <div class="card cartePublication centrer">
            <div class="card-body">
                <div class="ligne">
                    <div class="colonne1">
                        <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                    </div>
                    <div class="colonne2">
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

        <!-- Exemple de carte contenant un post sans commentaire -->
        <div class="card carteContenu centrer">
            <div class="card-body">
                <div class="row w-25">
                    <div class="col">
                        <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple1.png') }}" alt="exemple1"/></a>
                    </div>
                    <div class="col texteContenu">
                        <p>FrenchBrave</p>
                        <p>2H</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Bonjour, je m'appelle FrenchBrave. J'ai 22 ans et ma passion c'est l'informatique</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <i class="fa-regular fa-heart"></i>
                        <span class="badge bg-danger round-pill" style="margin-right: 10px;">3</span>

                        <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
        
                        <i class="fa-regular fa-flag"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card carteCommentaire centrer">
            <div class="card-body">
                <div class="ligne">
                    <div class="colonne1">
                        <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                    </div>
                    <div class="colonne2">
                        <textarea class="w-100" rows="2" placeholder="Écrivez un commentaire"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection