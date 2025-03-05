<?php
class Controller_infos_materiel extends Controller {

    public function action_default() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $m = Model::getModel();
            $tab = $m->getInfosEquipement($id);
            if ($tab) {
                $f = $m->getFournisseur($tab["id_fournisseur"]);
                $data = [
                    'title' => "Infos",
                    'infosMateriel' => $tab,
                    'fournisseur' => $f
                ];
                $this->render("infos_materiel", $data);
            }
            else {
                $this->action_error("Aucune information disponible pour l'équipement recherché.");
            }
        }
        else {
            header("Location: ?");
        }
    }

    public function action_logs() {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $m = Model::getModel();
            $tab = $m->getLogs($id);
            if ($tab) {
                $data = [
                    'title' => "Historique",
                    'idEquipement' => $id,
                    'typeEquipement' => $m->getTypeEquipement($id)["type_equipement"],
                    'logs' => $tab
                ];
                $this->render("logs", $data);
            }
            else {
                $this->action_error("Aucun historique trouvé.");
            }
        }
        else {
            $data = [
                'title' => "Accueil"
            ];
            $this->render("accueil", $data);
        }
    }
}
?>