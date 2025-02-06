<?php
class Controller_admin extends Controller {

    public function action_default() {
        $data = [
            'title' => "Modifier la base de données"
        ];
        $this->render("admin", $data);
    }
    
    public function action_ajout_banc() {
        $data = [
            'title' => "Ajouter un banc"
        ];
        $this->render("ajout_banc", $data);
    }

    public function action_ajout_materiel() {
        $data = [
            'title' => "Ajouter un équipement"
        ];
        $this->render("ajout_materiel", $data);
    }

    public function action_supprimer_banc() {
        $data = [
            'title' => "Supprimer un banc"
        ];
        $this->render("sup_banc", $data);
    }

    public function action_supprimer_materiel() {
        $data = [
            'title' => "Supprimer un materiel"
        ];
        $this->render("sup_materiel", $data);
    }

    public function action_modifier_banc() {
        $data = [
            'title' => "Modifier un banc"
        ];
        $this->render("modif_banc", $data);
    }

    public function action_modifier_materiel() {
        $data = [
            'title' => "Modifier un materiel"
        ];
        $this->render("modif_materiel", $data);
    }
}
?>