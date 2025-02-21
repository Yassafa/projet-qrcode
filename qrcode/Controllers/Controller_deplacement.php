<?php
class Controller_deplacement extends Controller {

    public function action_default() {
        if(isset($_SESSION["connecte"])) {
            if($_SESSION["role"] !== "Etudiant") {
                $m = Model::getModel();
                $data = [
                    'title' => "Déplacer un équipement",
                    'equipements' => $m->getListeEquipements(),
                    'bancs' => $m->getListeBancs()
                ];
                $this->render("deplacement", $data);
            }
            else {
                header("Location: ?");
            }
        }
        else {
            require "Utils/login.php";
        }
    }
    
    public function action_insert() {
        if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant") {
            $m = Model::getModel();
            if(isset($_POST["banc-origine"])) {
                $tab_or = explode(',', $_POST["banc-origine"]);
                $_POST["id-banc-origine"] = $tab_or[0];
                $_POST["id-salle-origine"] = $tab_or[1];
            }
            if(isset($_POST["banc-destination"])) {
                $tab_ds = explode(',', $_POST["banc-destination"]);
                $_POST["id-banc-destination"] = $tab_ds[0];
                $_POST["id-salle-destination"] = $tab_ds[1];
            }
            var_dump($_POST);
            $m->insertDeplacement($_POST);
        }
        else {
            $this->action_default();
        }
    }
}
?>