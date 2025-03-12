<?php require "view_begin.php"; 
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: 0");
?>

            <h2>INFORMATION ÉQUIPEMENT</h2>

            <div class="title">
                <h3 class="nom-materiel"><?= e($infosMateriel["type_equipement"]) ?> <?= e($infosMateriel["id_equipement"]) ?></h3>
                <a href="Content/qrcodes/<?= e($infosMateriel["id_equipement"]) . ".png" ?>" target="_blank">
                    <img class="qrcode" src="Content/qrcodes/<?= e($infosMateriel["id_equipement"]) . ".png" ?>"/>
                </a>
            </div>
            
            <img class="photo" id="photo-materiel" src="<?= e($infosMateriel["lien_photo"]) ?>" alt="<?= e($infosMateriel["type_equipement"]) ?>"/>

            <p>État : <?php if(e($infosMateriel["etat"]) == "Défectueux"): ?><p2 class="defectueux">⚠ Défectueux</p2><?php else: ?><?= e($infosMateriel["etat"]) ?><?php endif ?></p>
            <p>Localisation actuelle : <?= e($infosMateriel["nom_salle_actuelle"]) ?> - Banc <?= e($infosMateriel["id_banc_actuel"]) ?></p>
            <p>Lieu d'affectation : <?= e($infosMateriel["nom_salle_affectation"]) ?> - Banc <?= e($infosMateriel["id_banc_affectation"]) ?></p>
            <p>Date d'achat : <?= e($infosMateriel["date_achat_format"]) ?></p>
            <p>Fournisseur : <?php if($fournisseur): ?><?= e($fournisseur["nom_fournisseur"]) ?><?php endif ?></p>
            <p>Infos supplémentaires :<br><?= e($infosMateriel["infos_sup"]) ?></p>
            
            <br><br><br>

            <div id="liste-boutons">
                <?php if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant"): ?>
                    <a class="bouton bleu" id="deplacer" href="?controller=deplacement&id=<?= e($infosMateriel["id_equipement"]) ?>">Déplacer</a>
                <?php endif ?>
                <a class="bouton rouge" id="signaler" href="?controller=signal_anomalie&id=<?= e($infosMateriel["id_equipement"]) ?>">⚠ Signaler une anomalie</a>
                <a class="bouton bleu" id="logs" href="?controller=infos_materiel&action=logs&id=<?= e($infosMateriel["id_equipement"]) ?>">Historique des déplacements</a>
                <?php if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant"): ?>
                    <a class="bouton bleu" id="modifier" href="?controller=admin&action=modifier_materiel&id=<?= e($infosMateriel["id_equipement"]) ?>">Modifier</a>
                    <a class="bouton rouge" id="supprimer" href="?controller=admin&action=supprimer_materiel&id=<?= e($infosMateriel["id_equipement"]) ?>">Supprimer</a>
                <?php endif ?>

            </div>

<?php require "view_end.php"; ?>