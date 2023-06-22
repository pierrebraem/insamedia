@extends('layout.app')

@section('content')
    <div class="container">
        <div class="groupCard">
            <div class="carteA">
                <a href="/administrateur/utilisateurs" class="lienCarte supprimerLien">
                    <div class="iconCarte">
                        <i class="fa-solid fa-user fa-10x"></i>
                    </div>
                    <p class="textCarte">Gestion des utilisateurs</p>
                </a>
            </div>
            <div class="carteA alignementCarte1">
                <a href="/administrateur/signalements" class="lienCarte supprimerLien">
                    <div class="iconCarte">
                    <i class="fa-solid fa-triangle-exclamation fa-10x"></i>
                    </div>
                    <p class="textCarte">Gestion des signalements</p>
                </a>
            </div>
        </div>
    </div>
@endsection