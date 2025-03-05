INSERT INTO TypeAnomalie VALUES ("Disparition"), ("Panne"), ("Apparition");

INSERT INTO TypeEquipement VALUES ("Oscilloscope",""), ("GBF", ""), ("Alimentation", ""), ("Multimètre", "");

INSERT INTO Etat VALUES ("Opérationnel"), ("Défectueux"), ("Introuvable");

INSERT INTO Fournisseur(nom_fournisseur,email,date_derniere_modif,commentaires) VALUES
("Electro Depot", "electro.depot@gmail.com", "2025-02-10", ""),
("Leroy Merlin", "leroy.merlin@gmail.com", "2025-02-09", "");

INSERT INTO fournit VALUES ("Oscilloscope", 1), ("GBF", 2), ("Multimètre", 1), ("Multimètre", 2);

INSERT INTO Salle(nom_salle, date_reamenagement) VALUES
("O200", "2024-10-20"),
("Q202", "2023-06-10"),
("Q200", "2020-09-05"),
("Q206", "2018-12-16"),
("T208", "2021-07-31"),
("Q209", "2001-01-01"),
("Q200B", "2019-08-25"),
("P200", "2024-02-14"),
("Q201", "2017-03-23"),
("Q100", "2015-04-06"),
("R101", "2000-01-23"),
("S100", "2025-02-03");

INSERT INTO Banc(id_banc, id_salle, date_achat, commentaires, id_fournisseur) VALUES
("AJLOM", 1, "2024-10-21", "", 1),
("MPGTG", 1, "2024-10-30", "", 1),
("GTHYH", 2, "2023-06-12", "", 2),
("GYBYB", 2, "2021-01-02", "", 1),
("YHYHYU", 3, "2020-12-25", "", 1),
("VTTHH", 3, "2016-02-05", "", 1),
("TG5HY", 4, "2020-07-01", "", 2),
("VHHY", 4, "2010-05-17", "", 1),
("VBYHVYJ", 5, "2020-07-01", "", 1),
("XFTGT", 5, "2015-10-17", "", 1),
("VNHNUK", 6, "2021-01-18", "", 2),
("YYBBF", 6, "2022-04-23", "", 2),
("UHGRI", 7, "2022-04-30", "", 1),
("EGIJ", 7, "2019-06-25", "", 1),
("GOERJ", 8, "2012-02-16", "", 1),
("PZOOGF", 8, "2016-10-26", "", 2),
("EGETRG", 9, "2023-12-30", "", 1),
("FSRTH", 9, "2021-06-23", "", 2),
("SGTHYH", 10, "2008-05-09", "", 1),
("JRTDHR", 10, "2012-09-29", "", 2),
("EHTH", 11, "2002-02-20", "", 1),
("EHTYJ", 11, "2011-11-11", "", 1),
("OKJFO7", 12, "2001-05-26", "", 2);

INSERT INTO Equipement(id_equipement, date_achat, infos_sup, lien_photo, id_fournisseur, id_salle_actuelle, id_banc_actuel, etat, 
id_salle_affectation, id_banc_affectation, type_equipement) VALUES
("A46-JF", "2019-04-20", "bonjour", "Content/img/GBF1.jpg", 1, 5, "XFTGT", "Opérationnel", 2, "GTHYH", "GBF"),
("K98-6A", "2019-04-06", "hello", "Content/img/multimetre1.jpg", 2, 4, "VHHY", "Opérationnel", 2, "GTHYH", "Multimètre"),
("P30-MN", "2019-03-12", "aurevoir", "Content/img/alim1.jpg", 1, 9, "FSRTH", "Défectueux", 2, "GTHYH", "Alimentation"),
("T63-L9", "2019-04-09", "bye", "Content/img/oscilloscope1.jpg", 1, 11, "EHTH", "Opérationnel", 2, "GTHYH", "Oscilloscope");

INSERT INTO Anomalie(date_signalement, description_anomalie, personne_signalant, lien_photo, type_anomalie, id_equipement) VALUES
("2022-05-08 14:01:41", "câble endommagé", "F.Butelle", "Content/img/alim1", "Panne", "P30-MN"),
("2024-10-25 18:02:59", "problème surchauffe", "F.Butelle", "Content/img/oscilloscope1", "Panne", "T63-L9");

INSERT INTO Deplacement(date_deplacement, description_deplacement, personne_deplacant, id_salle_origine, id_banc_origine, 
id_salle_destination, id_banc_destination, id_equipement) VALUES
("2024-10-21 15:52:00", null, "N.Fabre", 2, "GTHYH", 4, "TG5HY", "T63-L9"),
("2024-10-23 13:56:00", null, "N.Fabre", 4, "TG5HY", 2, "GYBYB", "T63-L9"),
("2024-10-24 17:03:00", "Remis à sa place initiale", "N.Fabre", 2, "GYBYB", 2, "GTHYH", "T63-L9"),
("2024-11-11 09:36:00", null, "N.Fabre", 2, "GTHYH", 6, "YYBBF", "T63-L9"),
("2024-11-13 17:06:00", "Laissez-le à cette place j'en aurai besoin demain", "N.Fabre", 6, "YYBBF", 2, "GTHYH", "T63-L9");