@extends('layout.app')

@section('content')
    @if($errors->any())
        <div class="alert alert-info">
            <p>L'inscription ne pouvez pas être fait à cause d'une ou de plusieurs erreurs.</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="container">
        <h1 class="titre">Inscription</h1>
        <div class="card formulaire centrer">
            <div class="card-body">
                <form action="/inscription/sincrire" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Nom :</label>
                                <input type="text" class="form-control" name="nom" />
                            </div>
                            <div class="col">
                                <label>Prénom :</label>
                                <input type="text" class="form-control" name="prenom" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email :</label>
                        <input type="email" class="form-control" name="email" />
                    </div>

                    <div class="form-group">
                        <label>Date de naissance :</label>
                        <input type="date" class="form-control" name="datenaissance" />
                        <div class="form-text">
                            Vous devez avoir au moins 13 ans pour vous inscrire.
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pseudo :</label>
                        <input type="text" class="form-control" name="pseudo" />
                    </div>

                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input type="password" class="form-control" name="mdp" />
                        <div class="form-text">
                            Votre mot de passe doit avoir minimum 6 caractères.
                        </div>

                        <label>Confirmer le mot de passe :</label>
                        <input type="password" class="form-control" name="mdpC" />
                    </div>
                    <button type="submit" class="btn btn-primary centrer mt-3">Inscription</button>
                </form>
                <p class="petiteLigne">Vous avez déjà un compte ? Connectez-vous en cliquant <a href="/connexion">ici</a></p>
            </div>
        </div>
    </div>
@endsection