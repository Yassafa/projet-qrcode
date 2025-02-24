<?php require "view_begin.php"; ?>

            <h2>HISTORIQUE DES DÉPLACEMENTS</h2>
            <h3><?= e($typeEquipement) ?> <?= e($idEquipement) ?></h3>
            <?php foreach($logs as $action): ?>
            <p>Déplacement de <?= e($action["nom_salle_origine"]) ?> - Banc <?= e($action["id_banc_origine"]) ?> vers <?= e($action["nom_salle_destination"]) ?> - Banc <?= e($action["id_banc_destination"]) ?> le <?= e($action["date_deplacement_format"]) ?> par <?= e($action["personne_deplacant"]) ?>
            <?php if($action["description_deplacement"]): ?><br>Commentaires : <?= e($action["description_deplacement"]) ?><?php endif ?></p>
            <?php endforeach ?>

<?php require "view_end.php"; ?>