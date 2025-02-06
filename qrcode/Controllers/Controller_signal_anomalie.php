<?php
class Controller_signal_anomalie extends Controller {

    public function action_default() {
        $data = [
            'title' => "Signaler une anomalie"
        ];
        $this->render("signal_anomalie", $data);
    }
}
?>