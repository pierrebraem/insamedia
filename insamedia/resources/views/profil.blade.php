@extends('layout.app')

@section('content')
    <div class="containerP">
        <div class="section">
            <img id="banniere" src="{{ asset('images/banniereTest.jpg') }}" alt="banniere"/>
            <div class="alignementPseudo">
                <img id="pp" src="{{ asset('images/photo_default.jpg') }}" alt="default"/>
                <p id="pseudo">Cumulo</p>
            </div>
            <p id="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
@endsection