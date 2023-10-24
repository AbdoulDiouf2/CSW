-- Création de la base de données EsigPlay
CREATE DATABASE EsigPlay;

-- Utilisation de la base de données
USE EsigPlay;

-- Table des Utilisateurs
CREATE TABLE Utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    mot_de_passe VARCHAR(255),
    est_admin BOOLEAN
);

-- Table des Jeux de Plateau
CREATE TABLE JeuxDePlateau (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    description TEXT,
    categorie VARCHAR(255), -- Ajout de la catégorie
    regle_du_jeu MEDIUMBLOB, -- Pour stocker la règle du jeu au format PDF
    photo_1 VARCHAR(255), -- Nom du fichier de la première photo (ajuster le type de données selon les besoins)
    photo_2 VARCHAR(255)  -- Nom du fichier de la deuxième photo (ajuster le type de données selon les besoins)
);


-- Table des Parties à Venir
CREATE TABLE PartiesAVenir (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jeu INT,
    date_heure DATETIME,
    est_annule BOOLEAN DEFAULT 0, -- Champ pour indiquer si le créneau est annulé (0 par défaut, c'est-à-dire non annulé)
    annulation_raison VARCHAR(255), -- Champ pour la raison de l'annulation
    FOREIGN KEY (id_jeu) REFERENCES JeuxDePlateau(id)
);

-- Table des Intérêts des Membres
CREATE TABLE InteretsDesMembres (
    id_utilisateur INT,
    id_jeu INT,
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
    FOREIGN KEY (id_jeu) REFERENCES JeuxDePlateau(id)
);
