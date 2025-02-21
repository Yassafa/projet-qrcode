<?php require "view_begin.php"; ?>

            <h2>AJOUTER UN ÉQUIPEMENT</h2>
            <form action="?controller=admin&action=insert_materiel" method="post" id="form-ajout-materiel" autocomplete="off">
                <div>
                    <label>Identifiant :</label></br>
                    <input class="saisie" type="text" name="id-equipement" placeholder="Id" required/>
                </div>

                <div>
                    <label>Type d'équipement :</label></br>
                    <select name="type-equipement" required>
                        <option value="">Séléctionner le type</option>
                        <?php foreach($typesEquipement as $t): ?>
                            <option value=<?= e($t["type_equipement"]) ?>><?= e($t["type_equipement"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="lieu-affectation">
                    <label>Lieu d'affectation :</label>
                    <input class="saisie" type="text" name="id-banc" placeholder="N°banc" required/>
                    <select class="petit" name="id-salle" required>
                            <option value="">Salle</option>
                            <?php foreach($salles as $s): ?>
                                <option value=<?= e($s["id_salle"]) ?>><?= e($s["nom_salle"]) ?></option>
                            <?php endforeach ?>
                    </select>
                </div>

                <?php if($_SESSION["role"] === "Admin"): ?>
                <div>
                    <label>Date d'achat :</label></br>
                    <input class="date" type="date" name="date-achat"/>
                </div>

                <div>
                    <label>Fournisseur :</label></br>
                    <select name="id-fournisseur">
                        <option value="">Sélectionner le fournisseur</option>
                        <?php foreach($fournisseurs as $f): ?>
                            <option value=<?= e($f["id_fournisseur"]) ?>><?= e($f["nom_fournisseur"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php endif ?>

                <div class="preview">
                    <label>Photo :</label></br>
                    <img class = "photo hide" id="photo-ajout" src=""></img>
                    <p>Aucun fichier séléctionné</p>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu file" for="file-ajout">Ajouter une photo</label>
                    <input class="hide" id="file-ajout" type="file" name="lien-photo" accept="image/*" capture="environment" required/>
                </div>

                <div>
                    <label>Infos supplémentaires (optionnel) :</label></br>
                    <textarea name="commentaires" id="saisie-materiel"></textarea>
                </div>

                <div class="input">
                    <input class="bouton vert" type="submit" value="Ajouter"/>
                </div>
            </form>

<?php require "view_end.php"; ?>