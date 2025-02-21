<?php

class Model {
    private $bd;
    private static $instance = null;

    private function __construct() {
        include "credentials.php";
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    public static function getModel() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSalle($idSalle) {
        $req = $this->bd->prepare('SELECT nom_salle FROM salle WHERE id_salle = :ids');
        $req->bindValue(':ids', $idSalle);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getIdSalle($nomSalle) {
        $req = $this->bd->prepare('SELECT id_salle FROM salle WHERE nom_salle = :ns');
        $req->bindValue(':ns', $nomSalle);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getListeSalles() {
        $req = $this->bd->prepare('SELECT id_salle, nom_salle FROM salle');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTypeEquipement($idEquipement) {
        $req = $this->bd->prepare('SELECT type_equipement FROM equipement WHERE id_equipement = :ide');
        $req->bindValue(':ide', $idEquipement);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getListeTypes() {
        $req = $this->bd->prepare('SELECT * FROM typeequipement');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTypesAnomalie() {
        $req = $this->bd->prepare('SELECT * FROM typeanomalie');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBanc($idBanc,$idSalle) {
        $req = $this->bd->prepare('SELECT * FROM banc WHERE id_banc = :idb AND id_salle = :ids');
        $req->bindValue(':idb', $idBanc);
        $req->bindValue(':ids', $idSalle);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getEquipement($idEquipement) {
        $req = $this->bd->prepare('SELECT * FROM equipement WHERE id_equipement = :ide');
        $req->bindValue(':ide', $idEquipement);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getInfosBanc($idBanc, $idSalle) {
        $req = $this->bd->prepare(
            'SELECT * FROM equipement e JOIN banc b
            ON e.id_banc_affectation = b.id_banc AND e.id_salle_affectation = b.id_salle
            JOIN salle s ON e.id_salle_actuelle = s.id_salle
            WHERE e.id_banc_affectation = :idb AND id_salle_affectation = :ids');
        $req->bindValue(':idb', $idBanc);
        $req->bindValue(':ids', $idSalle);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListeBancs() {
        $req = $this->bd->prepare(
            'SELECT id_banc, id_salle, nom_salle FROM banc
            JOIN salle USING(id_salle)'
        );
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getInfosEquipement($idEquipement) {
        $req = $this->bd->prepare(
            'SELECT e.*, s_act.nom_salle AS nom_salle_actuelle,
            s_aff.nom_salle AS nom_salle_affectation,
            DATE_FORMAT(e.date_achat, "%d/%m/%Y") AS date_achat_format,
            f.nom_fournisseur FROM equipement e
            JOIN salle s_act ON e.id_salle_actuelle = s_act.id_salle
            JOIN salle s_aff ON e.id_salle_affectation = s_aff.id_salle
            LEFT OUTER JOIN fournisseur f ON e.id_fournisseur = f.id_fournisseur
            WHERE e.id_equipement = :ide'
        );
        $req->bindValue(':ide', $idEquipement);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getListeEquipements() {
        $req = $this->bd->prepare('SELECT id_equipement, type_equipement FROM equipement');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogs($idEquipement) {
        $req = $this->bd->prepare(
            'SELECT d.*, s_or.nom_salle AS nom_salle_origine,
            s_des.nom_salle AS nom_salle_destination,
            DATE_FORMAT(d.date_deplacement, "%d/%m/%Y") AS date_deplacement_format
            FROM deplacement d 
            JOIN salle s_or ON d.id_salle_origine = s_or.id_salle
            JOIN salle s_des ON d.id_salle_destination = s_des.id_salle
            WHERE d.id_equipement = :ide ORDER BY d.date_deplacement DESC'
        );
        $req->bindValue(':ide', $idEquipement);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getListeFournisseurs() {
        $req = $this->bd->prepare('SELECT id_fournisseur, nom_fournisseur FROM fournisseur');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBanc($data) {
        $req = $this->bd->prepare(
            'INSERT INTO banc(id_banc, id_salle, date_achat, commentaires, id_fournisseur) VALUES
            (:idb, :ids, :dta, :com, :idf)'
        );
        $req->bindValue(':idb', $data["id-banc"]);
        $req->bindValue(':ids', $data["id-salle"]);
        $req->bindValue(':dta', $data["date-achat"]);
        $req->bindValue(':com', $data["commentaires"]);
        $req->bindValue(':idf', $data["id-fournisseur"]);
        $req->execute();
    }

    public function addEquipement($data) {
        $req = $this->bd->prepare(
            'INSERT INTO equipement(id_equipement, date_achat, infos_sup, lien_photo, id_fournisseur, id_salle_actuelle,
            id_banc_actuel, etat, id_salle_affectation, id_banc_affectation, type_equipement) VALUES
            (:ide, :dta, :inf, :pht, :idf, :ids, :idb, "Opérationnel", :ids, :idb, :typ)'
        );
        $req->bindValue(':ide', $data["id-equipement"]);
        $req->bindValue(':dta', $data["date-achat"]);
        $req->bindValue(':inf', $data["commentaires"]);
        $req->bindValue(':pht', $data["lien-photo"]);
        $req->bindValue(':idf', $data["id-fournisseur"]);
        $req->bindValue(':ids', $data["id-salle"]);
        $req->bindValue(':idb', $data["id-banc"]);
        $req->bindValue(':typ', $data["type-equipement"]);
        $req->execute();
    }

    public function delBanc($data) {
        $req = $this->bd->prepare('DELETE FROM banc WHERE id_banc = :idb AND id_salle = :ids');
        $req->bindValue(':idb', $data["id-banc"]);
        $req->bindValue(':ids', $data["id-salle"]);
        $req->execute();
    }

    public function delEquipement($data) {
        $req = $this->bd->prepare('DELETE FROM equipement WHERE id_equipement = :ide');
        $req->bindValue(':ide', $data["id-equipement"]);
        $req->execute();
    }

    public function updateBanc($data) {
        $req = $this->bd->prepare(
            'UPDATE banc
            SET date_achat = :dta, id_fournisseur = :idf, commentaires = :com
            WHERE id_banc = :idb AND id_salle = :ids'
        );
        $req->bindValue(':idb', $data["id-banc"]);
        $req->bindValue(':ids', $data["id-salle"]);
        $req->bindValue(':dta', $data["date-achat"]);
        $req->bindValue(':com', $data["commentaires"]);
        $req->bindValue(':idf', $data["id-fournisseur"]);
        $req->execute();
    }

    public function updateEquipement($data) {
        $req = $this->bd->prepare(
            'UPDATE equipement
            SET type_equipement = :typ, id_banc_affectation = :idb, id_salle_affectation = :ids,
            date_achat = :dta, id_fournisseur = :idf, lien_photo = :pht, infos_sup = :inf
            WHERE id_equipement = :ide'
        );
        $req->bindValue(':ide', $data["id-equipement"]);
        $req->bindValue(':dta', $data["date-achat"]);
        $req->bindValue(':inf', $data["commentaires"]);
        $req->bindValue(':pht', $data["lien-photo"]);
        $req->bindValue(':idf', $data["id-fournisseur"]);
        $req->bindValue(':ids', $data["id-salle"]);
        $req->bindValue(':idb', $data["id-banc"]);
        $req->bindValue(':typ', $data["type-equipement"]);
        $req->execute();
    }

    public function insertAnomalie($data) {
        $req = $this->bd->prepare(
            'INSERT INTO anomalie(date_signalement, description_anomalie,
            personne_signalant, lien_photo, type_anomalie, id_equipement) 
            VALUES (CURDATE(), :dsc, null, :pht, :typ, :ide)'
        );
        $req->bindValue(':dsc', $data["description-anomalie"]);
        $req->bindValue(':pht', $data["lien-photo"]);
        $req->bindValue(':typ', $data["type-anomalie"]);
        $req->bindValue(':ide', $data["id-equipement"]);
        $req->execute();
    }

    public function insertDeplacement($data) {
        $req = $this->bd->prepare(
            'INSERT INTO deplacement(date_deplacement, description_deplacement, personne_deplacant,
            id_salle_origine, id_banc_origine, id_salle_destination, id_banc_destination, id_equipement)
            VALUES (CURDATE(), :dsc, null, :ids_or, :idb_or, :ids_ds, :idb_ds, :ide)'
        );
        $req->bindValue(':dsc', $data["description-deplacement"]);
        $req->bindValue(':ids_or', $data["id-salle-origine"]);
        $req->bindValue(':idb_or', $data["id-banc-origine"]);
        $req->bindValue(':ids_ds', $data["id-salle-destination"]);
        $req->bindValue(':idb_ds', $data["id-banc-destination"]);
        $req->bindValue(':ide', $data["id-equipement"]);
        $req->execute();
    }
}
?>