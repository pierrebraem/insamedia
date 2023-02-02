<!DOCTYPE html>
<html lang="fr">
@if(session()->get('id'))
    @include('template.enteteUtilisateurC')
@else
    @include('template.enteteUtilisateurN')
@endif

@yield('content')

@include('template.piedUtilisateur')
</html>