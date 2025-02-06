DROP TABLE IF EXISTS Anomalie;
DROP TABLE IF EXISTS Equipement;
DROP TABLE IF EXISTS TypeAnomalie;
DROP TABLE IF EXISTS Etat;
DROP TABLE IF EXISTS Banc;
DROP TABLE IF EXISTS Salle;
DROP TABLE IF EXISTS fournit;
DROP TABLE IF EXISTS TypeEquipement;
DROP TABLE IF EXISTS Fournisseur;

CREATE TABLE TypeAnomalie (
    type_anomalie VARCHAR(50) PRIMARY KEY
);

CREATE TABLE TypeEquipement (
    type_equipement VARCHAR(50) PRIMARY KEY,
    description_equipement TEXT
);

CREATE TABLE Etat (
    etat VARCHAR(50) PRIMARY KEY
);

CREATE TABLE Fournisseur (
    id_fournisseur SERIAL PRIMARY KEY,
    nom_fournisseur VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    date_derniere_modif DATE,
    commentaires TEXT
);

CREATE TABLE fournit (
    type_equipement VARCHAR(50) NOT NULL,
    id_fournisseur INT NOT NULL,
    PRIMARY KEY (type_equipement, id_fournisseur)
);

CREATE TABLE Salle (
    id_salle SERIAL PRIMARY KEY,
    nom_salle CHAR(50) UNIQUE NOT NULL,
    date_reamenagement DATE
);

CREATE TABLE Banc (
    id_banc CHAR(50) NOT NULL,
    id_salle INT NOT NULL REFERENCES Salle(id_salle),
    date_achat DATE,
    commentaires TEXT,
    id_fournisseur INT REFERENCES Fournisseur(id_fournisseur),
    PRIMARY KEY (id_banc, id_salle)
);

CREATE TABLE Equipement (
    id_equipement CHAR(50) PRIMARY KEY,
    date_achat DATE,
    infos_sup TEXT,
    lien_photo VARCHAR(50),
    id_fournisseur INT NOT NULL REFERENCES Fournisseur(id_fournisseur),
    id_salle_actuelle INT NOT NULL REFERENCES Salle(id_salle),
    etat VARCHAR(50) NOT NULL REFERENCES Etat(etat),
    id_salle_affectation INT NOT NULL REFERENCES Banc(id_salle),
    id_banc_affectation CHAR(50) NOT NULL REFERENCES Banc(id_banc),
    type_equipement VARCHAR(50) NOT NULL REFERENCES TypeEquipement(type_equipement)
);

CREATE TABLE Anomalie (
    id_anomalie SERIAL PRIMARY KEY,
    date_signalement DATE NOT NULL,
    description_anomalie TEXT,
    personne_signalant VARCHAR(50),
    lien_photo VARCHAR(50),
    type_anomalie VARCHAR(50) REFERENCES TypeAnomalie(type_anomalie),
    id_equipement INT REFERENCES Equipement(id_equipement)
);