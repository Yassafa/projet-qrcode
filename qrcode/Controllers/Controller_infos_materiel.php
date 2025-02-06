<?php
class Controller_infos_materiel extends Controller {

    public function action_default() {
        $data = [
            'title' => "Infos"
        ];
        $this->render("infos_materiel", $data);
    }
}
?>