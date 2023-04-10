@extends('layout.app')

@section('content')
    <div id="container">
        <h1 class="titre">Bienvenue sur Insamedia</h1>
        <div class="card formulaire centrer">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Adresse mail :</label>
                        <input type="email" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input type="password" class="form-control" name="mdp" />
                    </div>
                    <button type="submit" class="btn btn-primary centrer mt-3">Connexion</button>
                </form>
                <p class="petiteLigne">Pas de compte? Vous pouvez en créer un un <a href="/inscription">ici</a>
                <p class="petiteLigne">Mot de passe oublié? <a href="#">Réinitialisez-le</a>
            </div>
        </div>
    </div>
@endsection