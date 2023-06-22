@extends('layout.app')

@section('content')
    <div class="container">
        <div class="post" style="margin-top: 5px;">
            <div class="card center">
                <div class="row w-50">
                    <div class="col-2">
                        @if($publication->compte->photo === null)
                            <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfile"/>
                        @else
                            <img src="{{ asset($publication->compte->photo) }}" class="photoProfile"/>
                        @endif
                    </div>
                    <div class="col-6 texteContenu">
                        <p>{{$publication->compte->pseudo}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>{{$publication->description}}</p>
                        @if($publication->extension == 'jpg' || $publication->extension == 'jpeg' || $publication->extension == 'png' || $publication->extension == 'gif')
                            <img src="{{ asset($publication->urlcontenu) }}" class="photoPublication"/>
                        @elseif($publication->extension == 'mp4')
                            <video controls>
                                <source src="{{ asset($publication->urlcontenu) }}">
                            </video>
                        @elseif($publication->extension == 'mp3')
                            <audio controls src="{{ asset($publication->urlcontenu) }}">
                        @elseif($publication->urlcontenu != null)
                            <a href="{{ asset($publication->urlcontenu) }}" download>Télécharger fichier</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 5px;">
            <div class="card-header">
                <h4 class="text-center">Liste des signalements</h4> 
            </div>
            <div class="card-body">
                @foreach($signalements as $signalement)
                    <div class="row" style="border-bottom-style: solid;">
                        <div class="col">
                            <p>Pseudo : {{$signalement->sonCompte->pseudo}}</p>
                        </div>
                        <div class="col">
                            <p>Raison : {{$signalement->raison}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card" style="margin-top: 5px;">
            <div class="card-header">
                <h4 class="text-center">Action du signalement</h4>
            </div>
            <div class="card-body text-center">
                <a href="/administrateur/signalements/{{$publication->id}}/garder" class="btn btn-success">Garder la publication</a>
                <a href="/administrateur/signalements/{{$publication->id}}/supprimer" class="btn btn-danger">Supprimer la publication</a>
            </div>
        </div>

        <a href="/administrateur/signalements" class="btn btn-primary" style="margin-top: 5px;">Retour</a>
    </div>
@endsection