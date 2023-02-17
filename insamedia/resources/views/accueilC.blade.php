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
                    <div class="row w-25">
                        <div class="col">
                            <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple2.png') }}" alt="exemple2"/></a>
                        </div>
                        <div class="col texteContenu">
                            <p>DarkUranium</p>
                            <p>31 jan 2023</p>
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
                                            Mr.X - 5 jours
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
                                            DarkUranium - 5 jours
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
                                            Mr.X - 5 jours
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
                                            CrabyThunder - 1 jour
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
    </div>
@endsection