@extends('layout.app')

@section('content')
    <div id="container">
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
    </div>
@endsection