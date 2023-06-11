@extends('layout.app')

@section('content')
    <div class="container">
        @foreach($utilisateurs as $utilisateur)
            <div class="card" style="margin-top: 5px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            @if($utilisateur->photo == null)
                                <img src="{{ asset('images/photo_default.jpg') }}" class="photoProfileA"/>
                            @else
                                <img src="{{ asset($utilisateur->photo) }}" class="photoProfileA"/>
                            @endif
                        </div>
                        <div class="col">
                            <p>{{$utilisateur->nom}}</p>
                        </div>
                        <div class="col">
                            <p>{{$utilisateur->prenom}}</p>
                        </div>
                        <div class="col">
                            <p>{{$utilisateur->pseudo}}</p>
                        </div>
                        <div class="col">
                            <p>{{$utilisateur->sonRole->libelle}}</p>
                        </div>
                        <div class="col">
                            <a href="/administrateur/utilisateurs/{{$utilisateur->id}}" class="btn btn-primary">Consulter</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection