<?php require "view_begin.php"; ?>

            <h2>INFORMATION ÉQUIPEMENT</h2>

            <img class="photo" id="photo-materiel" src="<?= e($infosMateriel["lien_photo"]) ?>" alt="<?= e($infosMateriel["type_equipement"]) ?>"/>

            <h3 class="nom-materiel"><?= e($infosMateriel["type_equipement"]) ?> <?= e($infosMateriel["id_equipement"]) ?></h3>
            <p>État : <?php if(e($infosMateriel["etat"]) == "Défectueux"): ?><p2 class="defectueux">⚠ Défectueux</p2><?php else: ?><?= e($infosMateriel["etat"]) ?><?php endif ?></p>
            <p>Localisation actuelle : <?= e($infosMateriel["nom_salle_actuelle"]) ?> - Banc <?= e($infosMateriel["id_banc_actuel"]) ?></p>
            <p>Lieu d'affectation : <?= e($infosMateriel["nom_salle_affectation"]) ?> - Banc <?= e($infosMateriel["id_banc_affectation"]) ?></p>
            <p>Date d'achat : <?= e($infosMateriel["date_achat_format"]) ?></p>
            <p>Fournisseur : <?= e($infosMateriel["nom_fournisseur"]) ?></p>
            <p>Infos supplémentaires :<br><?= e($infosMateriel["infos_sup"]) ?></p>
            
            <br><br><br>

            <div id="liste-boutons">
                <?php if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant"): ?>
                    <a class="bouton bleu" id="deplacer" href="?controller=deplacement">Déplacer</a>
                <?php endif ?>
                <a class="bouton rouge" id="signaler" href="?controller=signal_anomalie">⚠ Signaler une anomalie</a>
                <a class="bouton bleu" id="logs" href="?controller=infos_materiel&action=logs&id=<?= e($infosMateriel["id_equipement"]) ?>">Historique des déplacements</a>
            </div>

<?php require "view_end.php"; ?>