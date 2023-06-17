@extends('layout.app')

@section('content')
    <form action="/parametre/modifProfil" method="post" enctype="multipart/form-data">
        @csrf
        <label>Nom :</label>
        <input type="text" name="nom" placeholder="Nom" value="{{$utilisateur->nom}}"/>

        <label>Prenom :</label>
        <input type="text" name="prenom" placeholder="Prenom" value="{{$utilisateur->prenom}}"/>

        <label>Pseudo :</label>
        <input type="text" name="pseudo" placeholder="Pseudo" value="{{$utilisateur->pseudo}}"/>

        <label>Description :</label>
        <textarea rows="3" name="description" placeholder="Description">{{$utilisateur->description}}</textarea>

        <label>Image de profil :</label>
        <input type="file" name="image"/>

        <input type="submit" class="btn btn-primary" value="Valider"/>
    </form>

    <a class="btn btn-danger" href="/parametre/{{$utilisateur->id}}/supprimer">Supprimer le compte</a>
@endsection