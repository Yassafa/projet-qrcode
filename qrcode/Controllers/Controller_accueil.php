<?php
class Controller_accueil extends Controller {

    public function action_default() {
        if(isset($_GET["banc"])) {
            $this->action_search_banc();
        }
        if(isset($_GET["materiel"])) {
            $this->action_search_materiel();
        }
        $m = Model::getModel();
        $tab = $m->getListeBancs();
        $listeBancs = [];
        foreach($tab as $banc) {
            $listeBancs[] = $banc["id_banc"] . " - " . $banc["nom_salle"];
        }

        $tab = $m->getListeEquipements();
        $listeEquipements = [];
        foreach($tab as $materiel) {
            $listeEquipements[] = $materiel["id_equipement"];
        }

        $data = [
            'title' => "Acceuil",
            'bancs' => $listeBancs,
            'equipements' => $listeEquipements
        ];
        $this->render("accueil", $data);
    }

    public function action_search_banc() {
        $m = Model::getModel();
        $tab = explode(' - ', $_GET["banc"]);
        if(count($tab) != 2) {
            $this->action_error("Aucun résultat.");
        }
        $idBanc = $tab[0];
        $idSalle = $m->getIdSalle($tab[1]);
        if(!($idSalle)) {
            $this->action_error("Aucun résultat.");
        }
        $idSalle = $idSalle["id_salle"];
        if($m->getBanc($idBanc,$idSalle)) {
            header("Location: ?controller=infos_banc&banc=".$idBanc."&salle=".$idSalle);
            die();
        }
        else {
            $this->action_error("Aucun résultat.");
        }
    }

    public function action_search_materiel() {
        $m = Model::getModel();
        $id = $_GET["materiel"];
        if($m->getEquipement($id)) {
            header("Location: ?controller=infos_materiel&id=".$id);
            die();
        }
        else {
            $this->action_error("Aucun résultat.");
        }
    }
}
?>