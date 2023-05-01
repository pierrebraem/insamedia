@extends('layout.app')

@section('content')
    <div class="containerP">
        <!-- Section présentation -->
        <div class="section">
            <img id="banniere" src="{{ asset('images/banniereTest.jpg') }}" alt="banniere"/>
            <div class="alignementPseudo">
                <img id="pp" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                <p id="pseudo">Cumulo</p>
                <a class="btn btn-primary ajout" href="#"><i class="fa-solid fa-user-group"></i></i></a>
            </div>
            <p id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <!-- Section amis -->
        <div class="section">
            <div class="card mt-2 mb-2">
                <h5 class="card-header">Amis - 8</h5>
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

            <!-- Carte avec une image -->
            <div class="post">
                <div class="card centrer">
                    <div class="card-body">
                        <div class="row w-50">
                            <div class="col-2">
                                <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple6.png') }}" alt="exemple6"/></a>
                            </div>
                            <div class="col-6 texteContenu">
                                <p>OscarBrave - 32min</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Voici une photo de mon chat trop mignon</p>
                                <p>Son nom est... Oups...</p>
                                <img class="photoPublication" src="{{ asset('images/Mon_chat.jpg') }}" alt="Mon_chat"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-heart"></i>
                                <span class="badge bg-danger round-pill" style="margin-right: 10px;">1.2k</span>

                                <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
                
                                <i class="fa-regular fa-flag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card carteCommentaireP centrer text-center">
                    <div class="card-body">
                        <p>Les commentaires sur ce post sont désactivées.</p>
                    </div>
                </div>
            </div>

            <!-- Publication partagée -->
            <div class="partage">
                <div class="card">
                    <div class="card-body">
                        <p>Cumulo a partagé cette publication</p>
                    </div>
                </div>
                <div class="card centrer">
                    <div class="card-body">
                        <div class="row w-50">
                            <div class="col-2">
                                <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple8.png') }}" alt="exemple8"/></a>
                            </div>
                            <div class="col-6 texteContenu">
                                <p>GhostMaj - 2J</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <p>Song: Netrum & Halvorsen - Phoenix [NCS Release]
                            Music provided by NoCopyrightSounds
                            Free Download/Stream: http://NCS.io/Phoenix
                            Watch: http://youtu.be/yH88qRmgkGI</p>
                                <audio controls src="{{ asset('audios/Netrum & Halvorsen - Phoenix [NCS Release].mp3') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <i class="fa-regular fa-heart"></i>
                                <span class="badge bg-danger round-pill" style="margin-right: 10px;">39.2k</span>

                                <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
                
                                <i class="fa-regular fa-flag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card carteCommentaireP centrer text-center">
                    <div class="card-body">
                        <p>Les commentaires sur ce post sont désactivées.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection