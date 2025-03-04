<?php
include "Utils/phpqrcode/qrlib.php";
$m = Model::getModel();
$listeBanc = $m->getListeBancs();
foreach($listeBanc as $banc) {
    $lien_stockage = "Content/qrcodes/" . $banc["id_banc"] . $banc["nom_salle"] . ".png"; 
    if(!(is_readable($lien_stockage))) {
        $lien_destination = "https://jupyter.univ-paris13.fr/projet-qrcode/?controller=infos_banc&banc=" . $banc["id_banc"] . "&salle=" . $banc["id_salle"];
        QRcode::png($lien_destination, $lien_stockage);
    }
}
$listeEquipements = $m->getListeEquipements();
foreach($listeEquipements as $materiel) {
    $lien_stockage = "Content/qrcodes/" . $materiel["id_equipement"] . ".png"; 
    if(!(is_readable($lien_stockage))) {
        $lien_destination = "https://jupyter.univ-paris13.fr/projet-qrcode/?controller=infos_materiel&id=" . $materiel["id_equipement"];
        QRcode::png($lien_destination, $lien_stockage);
    }
}
?>