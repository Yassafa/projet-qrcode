<?php require "view_begin.php"; ?>

            <h2>DÉPLACER UN ÉQUIPEMENT</h2>
            <form action="?controller=deplacement&action=insert" method="post" id="form-deplacement" autocomplete="off">
                <div>
                    <label>Matériel à déplacer : <b>*</b></label><br>
                    <select name="id-equipement" class="refMateriel" required>
                        <option value="">Séléctionner le matériel</option>
                        <?php foreach($equipements as $e): ?>
                            <option value="<?= e($e["id_equipement"]) ?>"
                            <?php if(e($e["id_equipement"]) == $materielDefaut): ?>selected<?php endif ?>>
                                <?= e($e["type_equipement"]) ?> <?= e($e["id_equipement"]) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                <label>Banc actuel  : <b>*</b></label><br>
                    <select name="banc-origine" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>"
                            <?php if($bancDefaut && e($b["id_salle"]) == $bancDefaut["id_salle_actuelle"] && $b["id_banc"] == $bancDefaut["id_banc_actuel"]): ?>selected<?php endif ?>>
                                Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                <label>Déplacer vers : <b>*</b></label><br>
                    <select name="banc-destination" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>">Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <div>
                    <label>Commentaires :</label><br>
                    <textarea name="description-deplacement" id="saisie-deplacement"></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Envoyer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>