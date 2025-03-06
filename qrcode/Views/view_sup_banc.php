<?php require "view_begin.php"; ?>

            <h2>SUPPRIMER UN BANC</h2>
            <form action="?controller=admin&action=del_banc" method="post" id="form-sup-banc" autocomplete="off">
                <div>
                    <label>Banc à supprimer : <b>*</b></label><br>
                    <select name="banc" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>">
                            Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="input">
                    <input class="bouton rouge" type="submit" value="Supprimer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>