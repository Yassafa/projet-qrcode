<?php
class Controller_admin extends Controller {

    public function action_default() {
        if(isset($_SESSION["connecte"])) {
            if($_SESSION["role"] !== "Etudiant") {
                $data = [
                    'title' => "Modifier la base de données"
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
            if(!(isset($_POST["id-banc"]) && preg_match("/^[A-Z,\?]{3,8}$/", $_POST["id-banc"]))){
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
            if ($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            $m->addBanc($_POST);
            var_dump($_POST);
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
                'typesEquipement' => $m->getListeTypes(),
                'salles' => $m->getListeSalles(),
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
            if(!(isset($_POST["id-equipement"]) && preg_match("/^[A-Z][0-9]{2}-[A-Z,0-9]{2}$/", $_POST["id-equipement"]))){
                $this->action_error("Identifiant invalide");
            }
            if ($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            if($_POST["id-fournisseur"] == "") {
                $_POST["id-fournisseur"] = null;
            }
            if(!(isset($_POST["id-banc"]) && isset($_POST["id-salle"]) && $m->getBanc($_POST["id-banc"],$_POST['id-salle']))){
                $this->action_error("Lieu affectation invalide");
            }
            var_dump($_POST);
            $m->addEquipement($_POST);
        }
        else {
            $this->action_default();
        }
    }

    public function action_supprimer_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            $data = [
                'title' => "Supprimer un banc",
                'salles' => $m->getListeSalles()
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
            if(!(isset($_POST["id-banc"]) && isset($_POST["id-salle"]) && $m->getBanc($_POST["id-banc"],$_POST['id-salle']))){
                $this->action_error("Aucun banc n'a été trouvé");
            }
            var_dump($_POST);
            $m->delBanc($_POST);
        }
        else {
            $this->action_default();
        }
    }

    public function action_supprimer_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $data = [
                'title' => "Supprimer un équipement"
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
            if(!(isset($_POST["id-equipement"]) && $m->getEquipement($_POST["id-equipement"]))){
                $this->action_error("Identifiant invalide");
            }
            var_dump($_POST);
            $m->delEquipement($_POST);
        }
        else {
            $this->action_default();
        }
    }

    public function action_modifier_banc() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            $data = [
                'title' => "Modifier un banc",
                'bancs' => $m->getListeBancs(),
                'fournisseurs' => $m->getListeFournisseurs()
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
            $tab = explode(',', $_POST["banc"]);
            $_POST["id-banc"] = $tab[0];
            $_POST["id-salle"] = $tab[1];
            if($_POST["date-achat"] === "") {
                $_POST["date-achat"] = null;
            }
            if($_POST["id-fournisseur"] == "") {
                $_POST["id-fournisseur"] = null;
            }
            var_dump($_POST);
            $m->updateBanc($_POST);
        }
        else {
            $this->action_default();
        }
    }

    public function action_modifier_materiel() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            $data = [
                'title' => "Modifier un équipement",
                'equipements' => $m->getListeEquipements(),
                'typesEquipement' => $m->getListeTypes(),
                'salles' => $m->getListeSalles(),
                'fournisseurs' => $m->getListeFournisseurs()
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
            if(!(isset($_POST["id-banc"]) && isset($_POST["id-salle"]) && $m->getBanc($_POST["id-banc"],$_POST['id-salle']))){
                $this->action_error("Lieu affectation invalide");
            }
            var_dump($_POST);
            $m->updateEquipement($_POST);
        }
        else {
            $this->action_default();
        }
    }
}
?>