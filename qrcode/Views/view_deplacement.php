<?php require "view_begin.php"; ?>

            <h2>DÉPLACER UN ÉQUIPEMENT</h2>
            <form action="?controller=deplacement&action=insert" method="post" id="form-deplacement" autocomplete="off">
                <div>
                    <label>Matériel  : </label>
                    <select name="id-equipement" required>
                        <option value="">Séléctionner le matériel</option>
                        <?php foreach($equipements as $e): ?>
                            <option value="<?= e($e["id_equipement"]) ?>"><?= e($e["type_equipement"]) ?> <?= e($e["id_equipement"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                <label>Banc d'origine  : </label></br>
                    <select name="banc-origine" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>">Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                <label>Déplacer vers : </label></br>
                    <select name="banc-destination" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>">Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
                <div>
                    <label>Commentaires (optionnel) :</label><br>
                    <textarea name="description-deplacement" id="saisie-deplacement"></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Envoyer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>