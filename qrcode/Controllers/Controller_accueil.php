<?php
class Controller_accueil extends Controller {

    public function action_default() {
        $data = [
            'title' => "Acceuil"
        ];
        $this->render("accueil", $data);
    }
}
?>