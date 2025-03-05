<?php
class Controller_infos_banc extends Controller {

    public function action_default() {
        if (isset($_GET["banc"]) && isset($_GET["salle"])) {
            $banc = $_GET["banc"];
            $salle = $_GET["salle"];
            $m = Model::getModel();
            $tab = $m->getBanc($banc, $salle);
            if ($tab) {
                $f = $m->getFournisseur($tab["id_fournisseur"]);
                $data = [
                    'title' => "Infos",
                    'numBanc' => $banc,
                    'numSalle' => $m->getSalle($salle)["nom_salle"],
                    'listeMateriel' => $m->getInfosBanc($banc,$salle),
                    'infosBanc' => $tab,
                    'fournisseur' => $f
                ];
                $this->render("infos_banc", $data);
            }
            else {
                $this->action_error("Ce banc n'existe pas dans la base de données");
            }
        }
        else {
            header("Location: ?");
        }
    }
}
?>