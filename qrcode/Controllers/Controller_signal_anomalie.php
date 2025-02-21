<?php
class Controller_signal_anomalie extends Controller {

    public function action_default() {
        if(isset($_SESSION["connecte"])) {
            $m = Model::getModel();
            $data = [
                'title' => "Signaler une anomalie",
                'equipements' => $m->getListeEquipements(),
                'typesAnomalie' => $m->getTypesAnomalie()
            ];
            $this->render("signal_anomalie", $data);
        }
        else {
            require "Utils/login.php";
        }
    }

    public function action_insert() {
        if(phpCAS::isAuthenticated()) {
            $m = Model::getModel();
            if(isset($_POST["lien-photo"]) && $_POST["lien-photo"] == "") {
                $_POST["lien-photo"] = null;
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