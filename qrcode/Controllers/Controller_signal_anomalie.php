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
            $m = Model::getModel();
            if (isset($_FILES["lien-photo"]) && $_FILES["lien-photo"]["error"] == 0) {
                $upload_dir = "Content/img/";
                $file_name = basename($_FILES["lien-photo"]["name"]);
                $target_file = $upload_dir . $file_name;
                if (move_uploaded_file($_FILES["lien-photo"]["tmp_name"], $target_file)) {
                    $_POST["lien-photo"] = $file_name;
                } else {
                    $this->action_error("Une error a eu lieu lors de l'importation de la photo.");
                }
            } else {
                $this->action_error("Aucun fichier importé.");
            }
            var_dump($_POST);
            $m->insertAnomalie($_POST);
        }
        else {
            $this->action_default();
        }
    }
}
?>