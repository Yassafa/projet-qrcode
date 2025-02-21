<?php require "view_begin.php"; ?>

            <h2>INFORMATIONS BANC <?= e($numBanc) ?> - <?= e($numSalle) ?></h2>
            
            <div id="liste-materiel">
                <?php foreach($infosBanc as $materiel): ?>
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

<?php require "view_end.php"; ?>