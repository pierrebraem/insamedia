@extends('layout.app')

@section('content')
    <form action="/parametre/modifProfil" method="post">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" placeholder="Nom" value="{{$utilisateur->nom}}"/>

        <label>Prenom :</label>
        <input type="text" name="prenom" placeholder="Prenom" value="{{$utilisateur->prenom}}"/>

        <label>Pseudo :</label>
        <input type="text" name="pseudo" placeholder="Pseudo" value="{{$utilisateur->pseudo}}"/>

        <label>Description :</label>
        <textarea rows="3" name="description" placeholder="Description">{{$utilisateur->description}}</textarea>

        <input type="submit" class="btn btn-primary" value="Valider"/>
    </form>
@endsection