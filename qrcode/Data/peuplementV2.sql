INSERT INTO TypeAnomalie VALUES ("Disparition"), ("Panne"), ("Apparition");

INSERT INTO TypeEquipement(type_equipement) VALUES ("Oscilloscope"), ("GBF"), ("Alimentation"), ("Multimetre");

INSERT INTO Etat VALUES ("Opérationnel"), ("Défectueux"), ("Introuvable");

INSERT INTO Fournisseur(nom_fournisseur) VALUES ("Agilent"), ("Metrix"), ("Keysight"), ("Fluke");

INSERT INTO fournit VALUES ("GBF", 1), ("Multimètre", 1), ("GBF", 2), ("Alimentation", 2), ("GBF", 3), ("Oscilloscope", 3);

INSERT INTO Salle(nom_salle) VALUES ("O200"), ("Q202"), ("Q200"), ("Q206"), 
("T208"), ("Q209"), ("Q200B"), ("P200"), ("Q201"), ("Q100"), ("R101"), ("S100");

INSERT INTO Banc(id_banc, id_salle) VALUES
("AJLOM", 2),
("MPGTG", 2),
("GTHYH", 2),
("GYBYB", 2),
("YHYHU", 2),
("VTTHH", 2),
("TGMHY", 2);

INSERT INTO Equipement(id_equipement, lien_photo, id_fournisseur, id_salle_actuelle, id_banc_actuel, etat, 
id_salle_affectation, id_banc_affectation, type_equipement) VALUES
("A46JF", "Content/img/GBF1.jpg", 3, 2, "AJLOM", "Opérationnel", 2, "AJLOM", "GBF"),
("K986A", "Content/img/Multimetre1.jpg", 1, 2, "AJLOM", "Opérationnel", 2, "AJLOM", "Multimètre"),
("P30MN", "Content/img/Alimentation1.jpg", 2, 2, "AJLOM", "Opérationnel", 2, "AJLOM", "Alimentation"),
("T63L9", "Content/img/Oscilloscope1.jpg", 3, 2, "AJLOM", "Opérationnel", 2, "AJLOM", "Oscilloscope"),

("5DF35", "Content/img/GBF1.jpg", 3, 2, "MPGTG", "Opérationnel", 2, "MPGTG", "GBF"),
("DF32G", "Content/img/Multimetre1.jpg", 1, 2, "MPGTG", "Opérationnel", 2, "MPGTG", "Multimètre"),
("D0F5G", "Content/img/Alimentation1.jpg", 2, 2, "MPGTG", "Opérationnel", 2, "MPGTG", "Alimentation"),
("DFV20", "Content/img/Oscilloscope1.jpg", 3, 2, "MPGTG", "Opérationnel", 2, "MPGTG", "Oscilloscope"),

("FDF51", "Content/img/GBF1.jpg", 3, 2, "GTHYH", "Opérationnel", 2, "GTHYH", "GBF"),
("DF95F", "Content/img/Multimetre1.jpg", 1, 2, "GTHYH", "Opérationnel", 2, "GTHYH", "Multimètre"),
("8FDVF", "Content/img/Alimentation1.jpg", 2, 2, "GTHYH", "Opérationnel", 2, "GTHYH", "Alimentation"),
("BQL20", "Content/img/Oscilloscope1.jpg", 3, 2, "GTHYH", "Opérationnel", 2, "GTHYH", "Oscilloscope"),

("2D0GD", "Content/img/GBF1.jpg", 3, 2, "GYBYB", "Opérationnel", 2, "GYBYB", "GBF"),
("DV51G", "Content/img/Multimetre1.jpg", 1, 2, "GYBYB", "Opérationnel", 2, "GYBYB", "Multimètre"),
("VD4VF", "Content/img/Alimentation1.jpg", 2, 2, "GYBYB", "Opérationnel", 2, "GYBYB", "Alimentation"),
("M47D5", "Content/img/Oscilloscope1.jpg", 3, 2, "GYBYB", "Opérationnel", 2, "GYBYB", "Oscilloscope"),

("VF47F", "Content/img/GBF2.jpg", 2, 2, "YHYHU", "Opérationnel", 2, "YHYHU", "GBF"),
("XVF51", "Content/img/Multimetre1.jpg", 1, 2, "YHYHU", "Opérationnel", 2, "YHYHU", "Multimètre"),
("SC11F", "Content/img/Alimentation1.jpg", 2, 2, "YHYHU", "Opérationnel", 2, "YHYHU", "Alimentation"),
("WCCSD", "Content/img/Oscilloscope1.jpg", 3, 2, "YHYHU", "Opérationnel", 2, "YHYHU", "Oscilloscope"),

("V66WW", "Content/img/GBF2.jpg", 2, 2, "VTTHH", "Opérationnel", 2, "VTTHH", "GBF"),
("G5HJ0", "Content/img/Multimetre1.jpg", 1, 2, "VTTHH", "Opérationnel", 2, "VTTHH", "Multimètre"),
("OKO55", "Content/img/Alimentation1.jpg", 2, 2, "VTTHH", "Opérationnel", 2, "VTTHH", "Alimentation"),
("G5X9X", "Content/img/Oscilloscope1.jpg", 3, 2, "VTTHH", "Opérationnel", 2, "VTTHH", "Oscilloscope"),

("GV10D", "Content/img/GBF3.jpg", 1, 2, "TGMHY", "Opérationnel", 2, "TGMHY", "GBF"),
("5D22V", "Content/img/Multimetre1.jpg", 1, 2, "TGMHY", "Opérationnel", 2, "TGMHY", "Multimètre"),
("95VDS", "Content/img/Alimentation1.jpg", 2, 2, "TGMHY", "Opérationnel", 2, "TGMHY", "Alimentation"),
("SFV7F", "Content/img/Oscilloscope1.jpg", 3, 2, "TGMHY", "Opérationnel", 2, "TGMHY", "Oscilloscope");