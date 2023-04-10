@extends('layout.app')

@section('content')
    <div id="container">
        <h1 class="titre">Inscription</h1>
        <div class="card formulaire centrer">
            <div class="card-body">
                <form>
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
                        <input type="date" class="form-control" name="dateNaissance" />
                    </div>

                    <div class="form-group">
                        <label>Pseudo :</label>
                        <input type="text" class="form-control" name="pseudo" />
                    </div>

                    <div class="form-group">
                        <label>Email :</label>
                        <input type="email" class="form-control" name="email" />
                    </div>

                    <div class="form-group">
                        <label>Mot de passe :</label>
                        <input type="password" class="form-control" name="password" />
                        <div class="form-text">
                            Votre mot de passe doit avoir minimum 6 caractères.
                        </div>

                        <label>Confirmer le mot de passe :</label>
                        <input type="password" class="form-control" name="password" />
                    </div>
                    <button type="submit" class="btn btn-primary centrer mt-3">Connexion</button>
                </form>
                <p class="petiteLigne">Vous avez déjà un compte ? Connectez-vous en cliquant <a href="/connexion">ici</a></p>
            </div>
        </div>
    </div>
@endsection