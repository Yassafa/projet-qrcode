DROP TRIGGER IF EXISTS update_on_delete;
DROP TABLE IF EXISTS Deplacement;
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
    email VARCHAR(50) UNIQUE,
    date_derniere_modif DATE,
    commentaires TEXT
);

CREATE TABLE fournit (
    type_equipement VARCHAR(50) NOT NULL REFERENCES TypeEquipement(type_equipement),
    id_fournisseur INT NOT NULL REFERENCES Fournisseur(id_fournisseur),
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
    lien_photo VARCHAR(50) NOT NULL,
    id_fournisseur INT REFERENCES Fournisseur(id_fournisseur),
    id_salle_actuelle INT NOT NULL REFERENCES Banc(id_salle),
    id_banc_actuel CHAR(50) NOT NULL REFERENCES Banc(id_banc),
    etat VARCHAR(50) NOT NULL REFERENCES Etat(etat),
    id_salle_affectation INT NOT NULL REFERENCES Banc(id_salle) ON DELETE CASCADE,
    id_banc_affectation CHAR(50) NOT NULL REFERENCES Banc(id_banc) ON DELETE CASCADE,
    type_equipement VARCHAR(50) NOT NULL REFERENCES TypeEquipement(type_equipement)
);

CREATE TABLE Anomalie (
    id_anomalie SERIAL PRIMARY KEY,
    date_signalement DATETIME NOT NULL,
    description_anomalie TEXT,
    personne_signalant VARCHAR(50),
    lien_photo VARCHAR(50),
    type_anomalie VARCHAR(50) NOT NULL REFERENCES TypeAnomalie(type_anomalie),
    id_equipement CHAR(50) NOT NULL REFERENCES Equipement(id_equipement) ON DELETE CASCADE
);

CREATE TABLE Deplacement (
    id_deplacement SERIAL PRIMARY KEY,
    date_deplacement DATETIME NOT NULL,
    description_deplacement TEXT,
    personne_deplacant VARCHAR(50),
    id_salle_origine INT NOT NULL REFERENCES Banc(id_salle),
    id_banc_origine CHAR(50) NOT NULL REFERENCES Banc(id_banc),
    id_salle_destination INT NOT NULL REFERENCES Banc(id_salle),
    id_banc_destination CHAR(50) NOT NULL REFERENCES Banc(id_banc),
    id_equipement CHAR(50) NOT NULL REFERENCES Equipement(id_equipement) ON DELETE CASCADE
);

CREATE TRIGGER update_on_delete BEFORE DELETE ON banc
FOR EACH ROW UPDATE equipement e SET 
e.id_salle_actuelle = e.id_salle_affectation,
e.id_banc_actuel = e.id_banc_affectation 
WHERE e.id_salle_actuelle = OLD.id_salle 
AND e.id_banc_actuel = OLD.id_banc;