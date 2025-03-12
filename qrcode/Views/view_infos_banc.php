<?php require "view_begin.php"; ?>

            <div class="title">
                <h2>INFORMATIONS BANC <?= e($numBanc) ?> - <?= e($numSalle) ?></h2>
                <a href="Content/qrcodes/<?= e($numBanc) . e($numSalle) . ".png" ?>" target="_blank">
                    <img class="qrcode" src="Content/qrcodes/<?= e($numBanc) . e($numSalle) . ".png" ?>"/>
                </a>
            </div>
            
            <div id="liste-materiel">
                <?php foreach($listeMateriel as $materiel): ?>
                <a class="materiel" href="?controller=infos_materiel&id=<?= e($materiel["id_equipement"]) ?>">
                    <img class="photo" src="<?= e($materiel["lien_photo"]) ?>" alt="<?= e($materiel["type_equipement"]) ?>">
                    <div class="infos">
                        <h3 class="nom-materiel"><?= e($materiel["type_equipement"]) ?> <?= e($materiel["id_equipement"]) ?></h3>
                        <p <?php if(e($materiel["etat"]) == "Défectueux"): ?>class="defectueux">⚠ Défectueux<?php else: ?>><?= e($materiel["etat"]) ?><?php endif ?></p>
                        <p>Situé en : <?= e($materiel["nom_salle"]) ?> - Banc <?= e($materiel["id_banc_actuel"]) ?></p>
                    </div>
                </a>
                <?php endforeach ?>
            </div>

            <p>Date d'achat : <?= e($infosBanc["date_achat_format"]) ?></p>
            <p>Fournisseur : <?php if($fournisseur): ?><?= e($fournisseur["nom_fournisseur"]) ?><?php endif ?></p>
            <p>Infos supplémentaires : <?= e($infosBanc["commentaires"]) ?></p>

            <br><br><br>

            <div id="liste-boutons">
                <?php if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant"): ?>
                    <a class="bouton bleu" id="modifier" href="?controller=admin&action=modifier_banc&banc=<?= e($numBanc) ?>&salle=<?= e($infosBanc["id_salle"]) ?>">Modifier</a>
                    <a class="bouton rouge" id="supprimer" href="?controller=admin&action=supprimer_banc&banc=<?= e($numBanc) ?>&salle=<?= e($infosBanc["id_salle"]) ?>">Supprimer</a>
                <?php endif ?>
            </div>

<?php require "view_end.php"; ?>