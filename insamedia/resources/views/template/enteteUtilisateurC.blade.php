<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styleProfil.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styleNotification.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styleMessage.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styleAdmin.css') }}" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/09475d7342.js" crossorigin="anonymous"></script>

    <title>Insamedia</title>
<head>
<body>
    <div id="navbarU">
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Insamedia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExtendU" aria-controls="navbarExtendU" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarExtendU">
                    <!-- Liens à droite de la navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="nav-link" href="/parcourir">Parcourir</a>
                        <a class="nav-link" href="#">Support</a>
                        @if(Session::get('role') != 3)
                            <a class="nav-link" href="/administrateur">Tableau de bord</a>
                        @endif
                    </ul>
                    
                    <!-- Liens à gauche de la navbar -->
                    <ul class="navbar-nav ms-auto">
                        <a class="nav-link" href="/notifications"><i class="fa-regular fa-bell icon"></i>@if(Session::get('nombreNotifications') != 0)<span class="badge badge-light round-pill">{{Session::get('nombreNotifications')}}</span>@endif</a>
                        <a class="nav-link" href="/message"><i class="fa-regular fa-envelope icon"></i></a>
                        <a class="nav-link" href="/profils/{{Session::get('id')}}"><i class="fa-regular fa-id-card icon"></i></a>
                        <a class="nav-link" href="/deconnexion"><i class="fa-solid fa-door-open icon"></i></a>
                        <a class="nav-link" href="/parametre/{{Session::get('id')}}"><i class="fa-solid fa-gear icon"></i></a>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @if($errors->count() != 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif