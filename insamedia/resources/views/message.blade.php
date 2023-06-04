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
                                    <a href="/message/{{$discussion->id}}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="discussion">
            @if($messages == null || $messages->count() == 0)
                <h2 class="text-center">Aucun messages</h2>
            @else
                @foreach($messages as $message)
                    @if($message->idcompted == Session::get('id'))
                        <div class="bulleR">
                            <div class="commentaireB">
                                <div class="card carteB">
                                    <p>{{$message->contenu}}</p>
                                </div>
                            </div>
                            <div class="imageB">
                                <img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                            </div>
                        </div>
                    @else
                        <div class="bulleD">
                            <div class="imageB">
                                <img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                            </div>
                            <div class="commentaireB">
                                <div class="card carteB">
                                    <p>{{$message->contenu}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div id="commentaireM">
            <form action="/message/envoyer/{{$id}}" method="post">
            @csrf
                <div class="ligneE">
                    <div class="colonneE1">
                        <a href="#"><img class="photoProfile elementDroite" src="{{ asset('images/photo_default.jpg') }}" alt="default"/></a>
                    </div>
                    <div class="colonneE2">
                        <textarea class="w-100" rows="3" placeholder="Ecrivez votre message ici" name="message"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-primary" value="Publier"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection