<?php
class Controller_admin extends Controller {

    public function action_default() {
        if(isset($_SESSION["connecte"])) {
            if($_SESSION["role"] !== "Etudiant") {
                $data = [
                    'title' => "Modifier la base de données",
                    'redirect' => "?controller=accueil"
                ];
                $this->render("admin", $data);
            }
            else {
                header("Location: ?");
            }
        }
        else {
            require "Utils/login.php";
        }
    }
    
    public function action_ajout_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            $tab = $m->getListeSalles();
            $listeSalles = [];
            foreach($tab as $salle) {
                $listeSalles[] = $salle["nom_salle"];
            }
            $data = [
                'title' => "Ajouter un banc",
                'redirect' => "?controller=accueil",
                'fournisseurs' => $m->getListeFournisseurs(),
                'salles' => $listeSalles
            ];
            $this->render("ajout_banc", $data);
        }
        else {
            $this->action_default();
        }
    }

    public function action_insert_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(!(isset($_POST["id-banc"]) && preg_match("/^[A-Z]{3,8}$/", $_POST["id-banc"]))){
                $this->action_error("id-banc vide/incorrect");
            }
            if(isset($_POST["nom-salle"])) {
                $idSalle = $m->getIdSalle($_POST["nom-salle"]);
                if($idSalle) {
                    $_POST["id-salle"] = $idSalle["id_salle"];
                }
                else {
                    $this->action_error("Salle incorrecte");
                }
            }
            else {
                $this->action_error("Aucun paramètre salle");
            }
            if($m->getBanc($_POST["id-banc"], $m->getIdSalle($_POST["nom-salle"])["id_salle"])) {
                $this->action_error("Ce banc existe déjà dans la base de données.");
            }
            if ($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            if ($_POST["id-fournisseur"] === "") {
                $_POST["id-fournisseur"] = null;
            }
            $m->addBanc($_POST);
            $lien_destination = "https://" . $_SERVER["SERVER_NAME"] . "/projet-qrcode/?controller=infos_banc&banc=" . $_POST["id-banc"] . "&salle=" . $_POST["id-salle"];
            $lien_stockage = "Content/qrcodes/" . $_POST["id-banc"] . $_POST["nom-salle"] . ".png";
            QRcode::png($lien_destination, $lien_stockage);
            header("Location: ?controller=infos_banc&banc=" . $_POST["id-banc"] . "&salle=" . $_POST["id-salle"]);
        }
        else {
            $this->action_default();
        }
    }

    public function action_ajout_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            $data = [
                'title' => "Ajouter un équipement",
                'redirect' => "?controller=accueil",
                'typesEquipement' => $m->getListeTypes(),
                'bancs' => $m->getListeBancs(),
                'fournisseurs' => $m->getListeFournisseurs()
            ];
            $this->render("ajout_materiel", $data);
        }
        else {
            $this->action_default();
        }
    }

    public function action_insert_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(!(isset($_POST["id-equipement"]) && preg_match("/^[A-Z,0-9]{5}$/", $_POST["id-equipement"]))){
                $this->action_error("Identifiant invalide");
            }
            if($m->getEquipement($_POST["id-equipement"])) {
                $this->action_error("Cet équipement existe déjà dans la base de données.");
            }
            if ($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            if($_POST["id-fournisseur"] == "") {
                $_POST["id-fournisseur"] = null;
            }
            if(isset($_POST["banc"])) {
                $tab = explode(',', $_POST["banc"]);
                $_POST["id-banc"] = $tab[0];
                $_POST["id-salle"] = $tab[1];
            }
            else {
                $this->action_error("Lieu d'affectation non renseigné.");
            }
            if (isset($_FILES["lien-photo"]) && $_FILES["lien-photo"]["error"] == 0) {
                $upload_dir = "Content/img/";
                $nb = $m->getNbEquipementsByType($_POST["type-equipement"])["nb"] + 1;
                $file_name = $_POST["type-equipement"] . $nb . ".jpg";
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES["lien-photo"]["tmp_name"], $target_file)) {
                    $_POST["lien-photo"] = $target_file;
                } 
                else {
                    $this->action_error("Une erreur a eu lieu lors de l'importation de la photo.");
                }
            } 
            else {
                $this->action_error("Aucun fichier importé.");
            }
            $m->addEquipement($_POST);
            $lien_destination = "https://" . $_SERVER["SERVER_NAME"] . "/projet-qrcode/?controller=infos_materiel&id=" . $_POST["id-equipement"];
            $lien_stockage = "Content/qrcodes/" . $_POST["id-equipement"] . ".png";
            QRcode::png($lien_destination, $lien_stockage);
            header("Location: ?controller=infos_materiel&id=" . $_POST["id-equipement"]);
        }
        else {
            $this->action_default();
        }
    }

    public function action_supprimer_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_GET["banc"]) && isset($_GET["salle"])) {
                $banc = $_GET["banc"];
                $salle = $_GET["salle"];
            }
            else {
                $banc = null;
                $salle = null;
            }
            $data = [
                'title' => "Supprimer un banc",
                'redirect' => "?controller=accueil",
                'bancDefaut' => $banc,
                'salleDefaut' => $salle,
                'bancs' => $m->getListeBancs()
            ];
            $this->render("sup_banc", $data);
        }
        else {
            $this->action_default();
        }
    }

    public function action_del_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_POST["banc"])){
                $tab = explode(',', $_POST["banc"]);
                $_POST["id-banc"] = $tab[0];
                $_POST["id-salle"] = $tab[1];
            }
            else {
                $this->action_error("Banc non renseigné");
            }
            $m->delBanc($_POST);
            header("Location: ?controller=admin");
        }
        else {
            $this->action_default();
        }
    }

    public function action_supprimer_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            else {
                $id = null;
            }
            $tab = $m->getListeEquipements();
            $listeEquipements = [];
            foreach($tab as $materiel) {
                $listeEquipements[] = $materiel["id_equipement"];
            }
            $data = [
                'title' => "Supprimer un équipement",
                'redirect' => "?controller=accueil",
                'equipements' => $listeEquipements,
                'materielDefaut' => $id
            ];
            $this->render("sup_materiel", $data);
        }
        else {
            $this->action_default();
        }
    }

    public function action_del_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            $materiel = $m->getEquipement($_POST["id-equipement"]);
            if(!(isset($_POST["id-equipement"]) && $materiel)){
                $this->action_error("Identifiant invalide");
            }
            $currentFile = $materiel["lien_photo"];
            if(file_exists($currentFile)) {
                $nb = $m->getNbEquipementsByType($materiel["type_equipement"])["nb"];
                $lastFile = "Content/img/" . $materiel["type_equipement"] . $nb . ".jpg";
                if($currentFile === $lastFile) {
                    unlink($materiel["lien_photo"]);
                }
                else {
                    rename($lastFile, $currentFile);
                    $m->setPhoto($lastFile, $currentFile);
                }
            }
            $m->delEquipement($_POST);
            header("Location: ?controller=admin");
        }
        else {
            $this->action_default();
        }
    }

    public function action_modifier_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_GET["banc"]) && isset($_GET["salle"])) {
                $banc = $_GET["banc"];
                $salle = $_GET["salle"];
                $infos = $m->getBanc($banc, $salle);
            }
            else {
                $banc = null;
                $salle = null;
                $infos = null;
            }
            $data = [
                'title' => "Modifier un banc",
                'redirect' => "?controller=accueil",
                'bancs' => $m->getListeBancs(),
                'fournisseurs' => $m->getListeFournisseurs(),
                'bancDefaut' =>  $banc,
                'salleDefaut' => $salle,
                'infosDefaut' => $infos
            ];
            $this->render("modif_banc", $data);
        }
        else {
            $this->action_default();
        }
    }

    public function action_update_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_POST["banc"])){
                $tab = explode(',', $_POST["banc"]);
                $_POST["id-banc"] = $tab[0];
                $_POST["id-salle"] = $tab[1];
            }
            else {
                $this->action_error("Lieu affectation non renseigné.");
            }
            if($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            if($_POST["id-fournisseur"] == "") {
                $_POST["id-fournisseur"] = null;
            }
            $m->updateBanc($_POST);
            header("Location: ?controller=infos_banc&banc=" . $_POST["id-banc"] . "&salle=" . $_POST["id-salle"]);
        }
        else {
            $this->action_default();
        }
    }

    public function action_modifier_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $infos = $m->getEquipement($id);
            }
            else {
                $id = null;
                $infos = null;
            }
            $data = [
                'title' => "Modifier un équipement",
                'redirect' => "?controller=accueil",
                'equipements' => $m->getListeEquipements(),
                'typesEquipement' => $m->getListeTypes(),
                'fournisseurs' => $m->getListeFournisseurs(),
                'bancs' => $m->getListeBancs(),
                'etats' => $m->getListeEtats(),
                'materielDefaut' => $id,
                'infosDefaut' => $infos
            ];
            $this->render("modif_materiel", $data);
        }
        else {
            $this->action_default();
        }
    }

    public function action_update_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if ($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            if($_POST["id-fournisseur"] == "") {
                $_POST["id-fournisseur"] = null;
            }
            if(isset($_POST["banc"])){
                $tab = explode(',', $_POST["banc"]);
                $_POST["id-banc"] = $tab[0];
                $_POST["id-salle"] = $tab[1];
            }
            else {
                $this->action_error("Lieu d'affectation non renseigné");
            }
            $lien_photo = $m->getInfosEquipement($_POST["id-equipement"])["lien_photo"];
            if (isset($_FILES["lien-photo"]) && $_FILES["lien-photo"]["error"] == 0) {
                $upload_dir = "Content/img/";
                $file_name = basename($lien_photo);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES["lien-photo"]["tmp_name"], $target_file)) {
                    $_POST["lien-photo"] = $target_file;
                } 
                else {
                    $this->action_error("Une erreur a eu lieu lors de l'importation de la photo.");
                }
            }
            else {
                $_POST["lien-photo"] = $lien_photo;
            }
            $m->updateEquipement($_POST);
            header("Location: ?controller=infos_materiel&id=" . $_POST["id-equipement"]);
        }
        else {
            $this->action_default();
        }
    }
}
?>