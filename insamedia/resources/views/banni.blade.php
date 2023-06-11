@extends('layout.app')

@section('content')
    <div class="text-center">
        <h2>Votre compte a était suspendu de la plateforme.</h2>
        <p>Vous n'avez plus accès aux fonctionnalités du site</p>
        <p>Raison : {{$bannissement->raison}}</p>
        <p>Date de fin : {{$bannissement->finban}} (UTC)</p>
    </div>
@endsection