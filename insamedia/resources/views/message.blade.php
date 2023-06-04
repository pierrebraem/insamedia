@extends('layout.app')

@section('content')
    <div id="containerM">
        <div id="listcontact">
            @foreach($listeDiscussions as $discussion)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="w-25">
                                <div class="col">
                                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <p>{{$discussion->pseudo}}</p>
                                </div>
                                <div class="row">
                                    <p class="apercuMessage">Vous : Salut, comment tu vas? - 18H</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="discussion">
            <div class="bulleD">
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                </div>
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>Salut !</p>
                    </div>
                </div>
            </div>

            <div class="bulleR">
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>Salut !</p>
                    </div>
                </div>
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                </div>
            </div>

            <div class="bulleR">
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>Salut !</p>
                    </div>
                </div>
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple1.png') }}" alt="default"/>
                </div>
            </div>

            <div class="bulleD">
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple2.png') }}" alt="default"/>
                </div>
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>Dum haec in oriente aguntur, Arelate hiemem agens Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.</p>
                    </div>
                </div>
            </div>

            <div class="bulleD">
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple3.png') }}" alt="default"/>
                </div>
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>Photo de mon cheval</p>
                        <img class="photoPublication" src="{{ asset('images/Mon_cheval.jpg') }}" alt="Mon_cheval"/>
                    </div>
                </div>
            </div>

            <div class="bulleR">
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>J'ai trouvé un bug sur ce jeu ce matin.</p>
                        <video width="500" heigth="500" controls>
                            <source src="{{ asset('videos/bug.mp4') }}">
                        </video>
                    </div>
                </div>
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple4.png') }}" alt="default"/>
                </div>
            </div>

            <div class="bulleR">
                <div class="commentaireB">
                    <div class="card carteB">
                        <p>Super musique</p>
                        <audio controls src="{{ asset('audios/Netrum & Halvorsen - Phoenix [NCS Release].mp3') }}">
                    </div>
                </div>
                <div class="imageB">
                    <img class="photoProfile elementDroite" src="{{ asset('images/photo_exemple5.png') }}" alt="default"/>
                </div>
            </div>
        </div>

        <div id="commentaireM">
            <div class="ligneE">
                <div class="colonneE1">
                    <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                </div>
                <div class="colonneE2">
                    <textarea class="w-100" rows="3" placeholder="Ecrivez votre message ici" name="publication"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection