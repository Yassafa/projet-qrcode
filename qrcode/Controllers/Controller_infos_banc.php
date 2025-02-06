<?php
class Controller_infos_banc extends Controller {

    public function action_default() {
        $data = [
            'title' => "Infos"
        ];
        $this->render("infos_banc", $data);
    }
}
?>