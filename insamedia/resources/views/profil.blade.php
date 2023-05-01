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
        <div class="section">
            <div class="card mt-2 mb-2">
                <h5 class="card-header">Amis - 8</h5>
                <div class="card-body">
                    <div class="resultat">
                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple1.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">FrenchBrave</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple2.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">DarkUranium</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple3.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">EmeraudeDragon</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple4.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">Mr.X</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple5.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">CrabyThunder</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple6.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">OscarBrave</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple7.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">BearX</figcaption>
                        </div>

                        <div class="resultatCol">
                            <img src="{{ asset('images/photo_exemple8.png') }}" class="photoProfile"/>
                            <figcaption class="labelResultat">GhostMaj</figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection