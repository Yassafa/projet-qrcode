<?php
class Controller_deplacement extends Controller {

    public function action_default() {
        if(isset($_SESSION["connecte"])) {
            if($_SESSION["role"] !== "Etudiant") {
                $m = Model::getModel();
                if(isset($_GET["id"])) {
                    $id = $_GET["id"];
                    $banc = $m->getInfosEquipement($id);
                }
                else {
                    $id = null;
                    $banc = null;
                }
                $data = [
                    'title' => "Déplacer un équipement",
                    'redirect' => "?controller=infos_materiel&id=" . $id,
                    'equipements' => $m->getListeEquipements(),
                    'bancs' => $m->getListeBancs(),
                    'materielDefaut' => $id,
                    'bancDefaut' => $banc
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
            else {
                $this->action_default();
            }
            if(isset($_POST["banc-destination"])) {
                $tab_ds = explode(',', $_POST["banc-destination"]);
                $_POST["id-banc-destination"] = $tab_ds[0];
                $_POST["id-salle-destination"] = $tab_ds[1];
            }
            $m->setLocalisation($_POST);
            $m->insertDeplacement($_POST);
            header("Location: ?controller=infos_materiel&id=" . $_POST["id-equipement"]);
        }
        else {
            $this->action_default();
        }
    }
}
?>