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

# Historique des versions
## V0.1.0
- Première version du projet
