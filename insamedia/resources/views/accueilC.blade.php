@extends('layout.app')

@section('content')
    <div id="container">
        <!-- Carte pour publier du contenu -->
        <div class="card cartePublication centrer">
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

        <!-- Exemple de carte contenant un post sans commentaire -->
        <div class="post">
            <div class="card carteContenu centrer">
                <div class="card-body">
                    <div class="row w-50">
                        <div class="col-2">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple1.png') }}" alt="exemple1"/></a>
                        </div>
                        <div class="col-6 texteContenu">
                            <p>FrenchBrave - 2H</p>
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
                    <p>Commentaire 0</p>
                    <div class="ligneE">
                        <div class="colonneE1">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                        </div>
                        <div class="colonneE2">
                            <textarea class="w-100" rows="2" placeholder="Écrivez un commentaire"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exemple de carte contenant un post avec des commentaires -->
        <div class="post">
            <div class="card carteContenu centrer">
                <div class="card-body">
                    <div class="row w-50">
                        <div class="col-2">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple2.png') }}" alt="exemple2"/></a>
                        </div>
                        <div class="col-6 texteContenu">
                            <p>DarkUranium - 31 jan 2023</p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Quelle est votre plat préférer?</p>
                            <p>Moi, personellement, c'est un plat de riz avec de la dinde accompagnée avec de la crème et des champions.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="fa-regular fa-heart"></i>
                            <span class="badge bg-danger round-pill" style="margin-right: 10px;">14</span>

                            <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
            
                            <i class="fa-regular fa-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card carteCommentaire centrer">
                <div class="card-body">
                    <p>Commentaires 6</p>
                    <!-- Commentaire sans de réponses -->
                    <div class="unCommentaire">
                        <div class="contenuCommentaire">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple3.png') }}" alt="exemple3"/></a>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-head texteContenu">
                                            EmeraudeDragon - 02 fev 2023 à 19H32
                                        </div>
                                        <div class="card-body">
                                            Moi, mon plat préférer c'est des pâtes (je sais, ce n'est pas très original).
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <i class="fa-regular fa-heart"></i>
                                    <span class="badge bg-danger round-pill" style="margin-right: 10px;">2</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Commentaire avec des réponses -->
                    <div class="unCommentaire">
                        <div class="contenuCommentaire">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple4.png') }}" alt="exemple4"/></a>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-head texteContenu">
                                            Mr.X - 5J
                                        </div>
                                        <div class="card-body">
                                            OMG. C'est aussi mon plat préférer!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col">
                                    <i class="fa-regular fa-heart"></i>
                                    <span class="badge bg-danger round-pill" style="margin-right: 10px;">1</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="contenuReponse" style="margin-left: 5%;">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple2.png') }}" alt="exemple2"/></a>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-head texteContenu">
                                            DarkUranium - 5J
                                        </div>
                                        <div class="card-body">
                                            Trop bien. On devrait s'ajouter en amis.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col">
                                        <i class="fa-regular fa-heart"></i>
                                        <span class="badge bg-danger round-pill" style="margin-right: 10px;">1</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contenuReponse" style="margin-left: 10%;">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple4.png') }}" alt="exemple4"/></a>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-head texteContenu">
                                            Mr.X - 5J
                                        </div>
                                        <div class="card-body">
                                            Avec plaisir :)
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col">
                                        <i class="fa-regular fa-heart"></i>
                                        <span class="badge bg-danger round-pill" style="margin-right: 10px;">1</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contenuReponse" style="margin-left: 5%;">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple5.png') }}" alt="exemple5"/></a>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-head texteContenu">
                                            CrabyThunder - 1J
                                        </div>
                                        <div class="card-body">
                                            Moi, je ne suis pas d'accord avec toi.
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
                    </div>

                    <div class="unCommentaire">
                        <div class="contenuCommentaire">
                            <div class="row">
                                <div class="col-1">
                                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple1.png') }}" alt="exemple1"/></a>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-head texteContenu">
                                            FrenchBrave - 12H
                                        </div>
                                        <div class="card-body">
                                            Moi, je n'ai pas de plat préférer :(
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
                    
                    <div class="ligneE">
                        <div class="colonneE1">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                        </div>
                        <div class="colonneE2">
                            <textarea class="w-100" rows="2" placeholder="Écrivez un commentaire"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exemple d'un post avec une image avec les commentaires désactivées -->
        <div class="post">
            <div class="card carteContenu centrer">
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
            <div class="card carteCommentaire centrer text-center">
                <div class="card-body">
                    <p>Les commentaires sur ce post sont désactivées.</p>
                </div>
            </div>
        </div>

         <!-- Exemple 2 d'un post avec une image avec les commentaires désactivées -->
         <div class="post">
            <div class="card carteContenu centrer">
                <div class="card-body">
                    <div class="row w-50">
                        <div class="col-2">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple6.png') }}" alt="exemple6"/></a>
                        </div>
                        <div class="col-6 texteContenu">
                            <p>OscarBrave - 21min</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>J'ai également un cheval du nom de Junior.</p>
                            <img class="photoPublication" src="{{ asset('images/Mon_cheval.jpg') }}" alt="Mon_cheval"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="fa-solid fa-heart"></i>
                            <span class="badge bg-danger round-pill" style="margin-right: 10px;">723</span>

                            <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
            
                            <i class="fa-regular fa-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card carteCommentaire centrer text-center">
                <div class="card-body">
                    <p>Les commentaires sur ce post sont désactivées.</p>
                </div>
            </div>
        </div>

        <!-- Exemple d'un post contenant une vidéo -->
        <div class="post">
            <div class="card carteContenu centrer">
                <div class="card-body">
                    <div class="row w-50">
                        <div class="col-2">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple7.png') }}" alt="exemple7"/></a>
                        </div>
                        <div class="col-6 texteContenu">
                            <p>BearX - 6H</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>J'ai trouvé un bug sur ce jeu ce matin.</p>
                            <video width="500" heigth="500" controls>
                                <source src="{{ asset('videos/bug.mp4') }}">
                            </video>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <i class="fa-regular fa-heart"></i>
                            <span class="badge bg-danger round-pill" style="margin-right: 10px;">64</span>

                            <i class="fa-solid fa-share" style="margin-right: 10px;"></i>
            
                            <i class="fa-regular fa-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card carteCommentaire centrer text-center">
                <div class="card-body">
                    <p>Les commentaires sur ce post sont désactivées.</p>
                </div>
            </div>
        </div>

        <!-- Exemple d'un post contenant une musique -->
        <div class="post">
            <div class="card carteContenu centrer">
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
            <div class="card carteCommentaire centrer text-center">
                <div class="card-body">
                    <p>Les commentaires sur ce post sont désactivées.</p>
                </div>
            </div>
        </div>
    </div>
@endsection