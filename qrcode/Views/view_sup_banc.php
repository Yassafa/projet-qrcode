<?php require "view_begin.php"; ?>

            <h2>SUPPRIMER UN BANC</h2>
            <form action="?controller=admin&action=del_banc" method="post" id="form-sup-banc" autocomplete="off">
                <div class="lieu-affectation">
                    <label>N° banc :</label></br>
                    <input class="saisie" type="text" name="id-banc" placeholder="N°" required/>
                    <label id="label-salle">Salle :</label></br>
                    <select class="petit" name="id-salle" required>
                        <option value="">Salle</option>
                        <?php foreach($salles as $s): ?>
                            <option value=<?= e($s["id_salle"]) ?>><?= e($s["nom_salle"]) ?>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="input">
                    <input class="bouton rouge" type="submit" value="Supprimer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>