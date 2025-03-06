<?php require "view_begin.php"; ?>

            <h2>AJOUTER UN BANC</h2>
            <form action="?controller=admin&action=insert_banc" method="post" id="form-ajout-banc" autocomplete="off">
                <div class="affectation">
                    <div>
                        <label>N° banc : <b>*</b></label><br>
                        <input class ="saisie" type="text" name="id-banc" placeholder="N°" required/>
                    </div>

                    <div class="autocomplete">
                        <label>Salle : <b>*</b></label><br>
                        <input class ="saisie" id="ajout-banc-salle" type="text" name="nom-salle" placeholder="Salle" required/>
                        <input type="hidden" id="liste-salles" value="<?= e(json_encode($salles)) ?>"/>
                    </div>
                </div>

                <?php if($_SESSION["role"] === "Admin"): ?>
                <div>
                    <label>Date d'achat :</label><br>
                    <input class="date" type="date" name="date-achat"/>
                </div>

                <div>
                    <label>Fournisseur :</label><br>
                    <select name="id-fournisseur">
                        <option value="">Sélectionner le fournisseur</option>
                        <?php foreach($fournisseurs as $f): ?>
                        <option value=<?= e($f["id_fournisseur"]) ?>><?= e($f["nom_fournisseur"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php else: ?>
                <input type="hidden" name="date-achat"/>
                <input type="hidden" name="id-fournisseur"/>
                <?php endif ?>

                <div>
                    <label>Infos supplémentaires :</label><br>
                    <textarea name="commentaires" id="saisie-banc"></textarea>
                </div>

                <div class="input">
                    <input class="bouton vert" type="submit" value="Ajouter"/>
                </div>
            </form>

<?php require "view_end.php"; ?>