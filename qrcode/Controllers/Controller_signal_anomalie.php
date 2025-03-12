<?php
class Controller_signal_anomalie extends Controller {

    public function action_default() {
        if(isset($_SESSION["connecte"])) {
            $m = Model::getModel();
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
            }
            else {
                $id = null;
            }
            $data = [
                'title' => "Signaler une anomalie",
                'redirect' => "?controller=infos_materiel&id=" . $id,
                'equipements' => $m->getListeEquipements(),
                'typesAnomalie' => $m->getTypesAnomalie(),
                'materielDefaut' => $id
            ];
            $this->render("signal_anomalie", $data);
        }
        else {
            require "Utils/login.php";
        }
    }

    public function action_insert() {
        if(isset($_SESSION["connecte"])) {
            if(!(isset($_POST["id-equipement"]) && isset($_POST["type-anomalie"]))) {
                $this->action_default();
            }
            $m = Model::getModel();
            $ide = $_POST["id-equipement"];
            $type = $_POST["type-anomalie"];
            if (isset($_FILES["lien-photo"]) && $_FILES["lien-photo"]["error"] == 0) {
                $upload_dir = "Content/img/";
                $file_name = basename($_FILES["lien-photo"]["name"]);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES["lien-photo"]["tmp_name"], $target_file)) {
                    $_POST["lien-photo"] = $file_name;
                } 
                else {
                    $this->action_error("Une erreur a eu lieu lors de l'importation de la photo.");
                }
            } 
            else {
                $_POST["lien-photo"] = null;
            }
            if($type === "Disparition") {
                $m->setEtat($ide, "Introuvable");
            }
            elseif($type === "Panne") {
                $m->setEtat($ide, "Défectueux");
            }
            $m->insertAnomalie($_POST);
            header("Location: ?controller=infos_materiel&id=" . $ide);
        }
        else {
            $this->action_default();
        }
    }
}
?>