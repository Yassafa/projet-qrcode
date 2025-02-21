<?php
class Controller_infos_banc extends Controller {

    public function action_default() {
        if (isset($_GET["banc"]) && isset($_GET["salle"])) {
            $banc = $_GET["banc"];
            $salle = $_GET["salle"];
            $m = Model::getModel();
            $tab = $m->getInfosBanc($banc,$salle);
            if ($tab) {
                $data = [
                    'title' => "Infos",
                    'numBanc' => $banc,
                    'numSalle' => $m->getSalle($salle)["nom_salle"],
                    'infosBanc' => $tab
                ];
                $this->render("infos_banc", $data);
            }
            else {
                $this->action_error("Aucune information disponible pour le banc recherché.");
            }
        }
        else {
            header("Location: ?");
        }
    }
}
?>