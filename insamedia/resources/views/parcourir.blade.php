@extends('layout.app')

@section('content')
<div class="container">
    <!-- Carte recherche -->
    <div class="card mt-4 text-center">
        <h5 class="card-header">Rechercher</h5>
        <div class="card-body">
            <p>Rechercher une personne, un post, une photo, une vidéo ou une musique.</p>
            <input class="form-control mb-2" type="search" placeholder="Rechercher"/>
            <button class="btn btn-dark"><i class="fa-solid fa-filter" id="rechercheFiltre"></i></button>
            <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <!-- Carte profil -->
    <div class="card mt-5">
        <h5 class="card-header">Profils - 8</h5>
        <div class="card-body">
            <div class="resultat">
                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple1.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">FrenchBrave</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple2.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">DarkUranium</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple3.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">EmeraudeDragon</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple4.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">Mr.X</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple5.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">CrabyThunder</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple6.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">OscarBrave</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple7.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">BearX</figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/photo_exemple8.png') }}" class="photoProfile"/>
                    <figcaption class="labelResultat">GhostMaj</figcaption>
                </div>
            </div>
        </div>
    </div>

    <!-- Carte images -->
    <div class="card mt-5">
        <h5 class="card-header">Images - 2</h5>
        <div class="card-body">
            <div class="resultat">
                <div class="resultatCol">
                    <img src="{{ asset('images/Mon_chat.jpg') }}" class="image"/>
                    <figcaption class="labelResultat">
                        <p>Mon chat</p>
                        <p>De OscarBrave</p>
                    </figcaption>
                </div>

                <div class="resultatCol">
                    <img src="{{ asset('images/Mon_cheval.jpg') }}" class="image"/>
                    <figcaption class="labelResultat">
                        <p>Mon cheval</p>
                        <p>De OscarBrave</p>
                    </figcaption>
                </div>
            </div>
        </div>
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