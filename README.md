# Installation du projet en local

1. Télécharger le zip ou cloner le projet git sur votre ordinateur
2. Allez dans le dossier "insamedia" puis ouvrez un terminal dessus
3. Sur le terminal tapez la commande "composer install". Cela va télécharger tous les dépendences nécessaires
4. Une fois fait, tapez la commande "php artisan serve"
5. Ensuite, ouvrez un navigateur et taper dans la barre d'adresse "localhost:8000"

# Installation de la base de données en local

1. Allez sur la branche "docsBDD"
2. Allez dans le dossier "BDD" et téléchargez le fichier "creationBDD.sql"
3. Executez le script dans un gestion de base de données
4. Normalement, une base de données nommé "insamedia" avec un compte "site" se créer.
5. Renseignez les informations de la base de données dans le .env du projet (pour plus d'information, voir la section "Connexion à la base de données")

# Connexion à la base de données

1. Ouvrez le .env du projet qui se trouve dans la racine du projet
2. Vous trouverez ces informations suivantes :
- DB_HOST : l'adresse IP du serveur de la base de données
- DB_PORT : Port de la base de données
- DB_DATABASE : Nom de la base de données
- DB_USERNAME : Nom d'utilisateur pour intéragir avec la base de données
- DB_PASSWORD : Mon de passe du compte utilisateur

# Ajout d'un compte administrateur
Laravel utilise un hash qui est inconnu par MySQL. Il est donc impossible de créer un compte admin via un script MySQL.
Pour créer un compte admin :
- Créer un compte via le site
- Dans la base de données, table compte, sélectionner le compte créer et mettez l'id rôle à 1

# Historique des versions
## v0.1.0
- Première version du projet

## v0.1.1
### Fonctionnalités
- Possibilité de bloquer un utilisateur
- Implémentation des notifications
- Implémentation d'une page de visualisation de publication
### Améliorations
- Amélioration de la vérification du statut d'admistrateur ou de modérateur d'un utilisateur
- Amélioration de la gestion d'erreurs
- Les comptes ne peuvent plus avoir le même pseudo
- Affichage du nombre de notifications
### Traduction
- Traduction des messages d'erreurs en français
### Optimisation
- Transfère de la fonction "autoriserVoirPublication" du controleur Utilisateur au controleur Publication
### Bugs
- Correction d'un bug où certains éléments apparaient en bleu
- Correction d'un bug où les photos de profil n'apparaissent pas sur la carte d'ajout d'une publication, d'un commentaire ou d'un message
- Correction d'un bug où la photo profil de l'envoyeur du message était le même que celle de l'utilisateur actuel
- Correction d'un bug où un utilisateur non connecté pouvait accéder aux fonctionnalités administrateurs
- Correction d'un bug où il y avait un problème d'affichage des photos de profil dans les commentaires
- Correction d'un bug où un utilisateur non connecté voyait la carte pour publier du contenu sur un profil
- Correction d'un bug où un utilisateur non connecté pouvait ajouter un commentaire
- Correction d'un bug où un utilisateur non connecté pouvait aimer une publication
- Correction d'un bug où un utilisateur connecté pouvait accéder aux pages inscription et connexion
- Correction d'un bug où les signalements ne se supprimer pas bien lors de la suppression d'un compte
- Correction d'un bug où les informations dans les modals s'envoyer après avoir cliquer sur les boutons d'annulation
