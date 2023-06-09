-- Création de la base de données
DROP DATABASE IF EXISTS insamedia;
CREATE DATABASE insamedia;
USE insamedia;

-- Création des tables
-- Création de la table 'role'
CREATE TABLE role(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(25) NOT NULL
);

-- Création de la table 'compte'
CREATE TABLE compte(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    datenaissance DATE NOT NULL,
    pseudo VARCHAR(50) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NULL,
    description VARCHAR(255) NULL,
    idrole INT(10) NOT NULL
);

-- Création de la table 'amis'
CREATE TABLE amis(
    idcompted INT(10) NOT NULL,
    idcompter INT(10) NOT NULL,
    attente TINYINT(1) NOT NULL DEFAULT 1,
    PRIMARY KEY(idcompted, idcompter)
);

-- Création de la table 'typenotification'
CREATE TABLE typenotification(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(50) NOT NULL
);

-- Création de la table 'notification'
CREATE TABLE notification(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    contenu VARCHAR(255) NOT NULL,
    vu TINYINT(1) NOT NULL DEFAULT 0,
    date TIMESTAMP NOT NULL,
    idtype INT(10) NOT NULL,
    idcompter INT(10) NOT NULL,
    idcompteo INT(10) NOT NULL,
    idpublication INT(10) NULL
);

-- Création de la table 'bloquer'
CREATE TABLE bloquer(
    idcompted INT(10) NOT NULL,
    idcompter INT(10) NOT NULL,
    PRIMARY KEY(idcompted, idcompter)
);

-- Création de la table 'bannissement'
CREATE TABLE bannissement(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    raison VARCHAR(255) NOT NULL,
    duree TINYINT(3) NOT NULL,
    idcompte INT(10) NOT NULL
);

-- Création de la table 'parametres'
CREATE TABLE parametres(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    messagehorsamis TINYINT(1) NOT NULL DEFAULT 0,
    idcompte INT(10) NOT NULL
);

-- Création de la table 'message'
CREATE TABLE message(
    id INT(10) NOT NULL AUTO_INCREMENT,
    idcompted INT(10) NOT NULL,
    idcompter INT(10) NOT NULL,
    contenu LONGTEXT NOT NULL,
    urlcontenu VARCHAR(255) NULL,
    nomorigine VARCHAR(255) NULL,
    date TIMESTAMP NOT NULL,
    PRIMARY KEY(id, idcompted, idcompter)
);

-- Création de la table 'visibilite'
CREATE TABLE visibilite(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(25) NOT NULL
);

-- Création de la table 'publication'
CREATE TABLE publication(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    description LONGTEXT NOT NULL,
    date TIMESTAMP NOT NULL,
    urlcontenu VARCHAR(255) NULL,
    nomorigine VARCHAR(255) NULL,
    aCommentaire TINYINT(1) NOT NULL DEFAULT 0,
    idcompte INT(10) NOT NULL,
    idprofil INT(10) NOT NULL,
    idvisibilite INT(10) NOT NULL
);

-- Création de la table 'aimer'
CREATE TABLE aimer(
    idpublication INT(10) NOT NULL,
    idcompte INT(10) NOT NULL,
    PRIMARY KEY(idpublication, idcompte)
);

-- Création de la table 'commentaire'
CREATE TABLE commentaire(
    idpublication INT(10) NOT NULL,
    idcompte INT(10) NOT NULL,
    commentaire LONGTEXT NOT NULL,
    PRIMARY KEY(idpublication, idcompte)
);

-- Création de la table 'signalement'
CREATE TABLE signalement(
    id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    raison LONGTEXT NOT NULL,
    idcompte INT(10) NULL,
    idpublication INT(10) NULL
);

-- Génération des données préenregistrer dans les tables correspondantes
-- Ajout des données dans la table 'role'
INSERT INTO role(libelle) VALUES
('Administrateur'),
('Modérateur'),
('Utilisateur');

-- Ajout des données dans la table 'visibilite'
INSERT INTO visibilite(libelle) VALUES
('publique'),
('amis seulement'),
('privée');

-- Ajout des données dans la table 'typenotification'
INSERT INTO typenotification(libelle) VALUES
('demandeAmis');

-- Insertion des clés étrangères
-- Insertion de la clé étrangère dans la table 'compte'
ALTER TABLE compte
ADD CONSTRAINT fk_compte_role FOREIGN KEY (idrole) REFERENCES role(id);

-- Insertion des clés étrangères dans la table 'amis'
ALTER TABLE amis
ADD CONSTRAINT fk_compte_amis_d FOREIGN KEY (idcompted) REFERENCES compte(id),
ADD CONSTRAINT fk_compte_amis_r FOREIGN KEY (idcompter) REFERENCES compte(id);

-- Insertion de la clés étrangère dans la table 'notification'
ALTER TABLE notification
ADD CONSTRAINT fk_notification_typenotification FOREIGN KEY (idtype) REFERENCES typenotification(id),
ADD CONSTRAINT fk_notification_compte_r FOREIGN KEY (idcompter) REFERENCES compte(id),
ADD CONSTRAINT fk_notification_compte_o FOREIGN KEY (idcompteo) REFERENCES compte(id),
ADD CONSTRAINT fk_notification_publication FOREIGN KEY (idpublication) REFERENCES publication(id);

-- Insertion des clès étrangères dans la table 'bloquer'
ALTER TABLE bloquer
ADD CONSTRAINT fk_compte_bloquer_d FOREIGN KEY (idcompted) REFERENCES compte(id),
ADD CONSTRAINT fk_compte_bloquer_r FOREIGN KEY (idcompter) REFERENCES compte(id);

-- Insertion de la clé étrangère dans la table 'bannissement'
ALTER TABLE bannissement
ADD CONSTRAINT fk_bannissement_compte FOREIGN KEY (idcompte) REFERENCES compte(id);

-- Insertion de la clé étrangère dans la table 'parametres'
ALTER TABLE parametres
ADD CONSTRAINT fk_parametres_compte FOREIGN KEY (idcompte) REFERENCES compte(id);

-- Inssertion des clés étrangères dans la table 'message'
ALTER TABLE message
ADD CONSTRAINT fk_compte_message_d FOREIGN KEY (idcompted) REFERENCES compte(id),
ADD CONSTRAINT fk_compte_message_r FOREIGN KEY (idcompter) REFERENCES compte(id);

-- Insertion des clés étrangères dans la table 'publication'
ALTER TABLE publication
ADD CONSTRAINT fk_publication_compte FOREIGN KEY (idcompte) REFERENCES compte(id),
ADD CONSTRAINT fk_publication_profil FOREIGN KEY (idprofil) REFERENCES compte(id),
ADD CONSTRAINT fk_publication_visibilite FOREIGN KEY (idvisibilite) REFERENCES visibilite(id);

-- Insertion des clés étrangères dans la table 'aimer'
ALTER TABLE aimer
ADD CONSTRAINT fk_aimer_publication FOREIGN KEY (idpublication) REFERENCES publication(id),
ADD CONSTRAINT fk_aimer_compte FOREIGN KEY (idcompte) REFERENCES compte(id);

-- Insertion des clés étrangères dans la table 'commentaire'
ALTER TABLE commentaire
ADD CONSTRAINT fk_commentaire_publication FOREIGN KEY (idpublication) REFERENCES publication(id),
ADD CONSTRAINT fk_commentaire_compte FOREIGN KEY (idcompte) REFERENCES compte(id);

-- Insertion des clés étrangères dans la table 'signalement'
ALTER TABLE signalement
ADD CONSTRAINT fk_signalement_compte FOREIGN KEY (idcompte) REFERENCES compte(id),
ADD CONSTRAINT fk_signalement_publication FOREIGN KEY (idpublication) REFERENCES publication(id);

-- Créer et donne tous les droits sur la base de données à l'utilisateur 'site'
DROP USER IF EXISTS 'site'@'%';
CREATE USER 'site'@'%' IDENTIFIED WITH mysql_native_password BY '123456';
GRANT ALL ON insamedia.* TO 'site'@'%';