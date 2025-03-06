<?php require "view_begin.php"; ?>

            <h2>AJOUTER UN ÉQUIPEMENT</h2>
            <form action="?controller=admin&action=insert_materiel" method="post" id="form-ajout-materiel" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <label>Identifiant : <b>*</b></label></br>
                    <input class="saisie" type="text" name="id-equipement" placeholder="Id" required/>
                </div>

                <div>
                    <label>Type d'équipement : <b>*</b></label></br>
                    <select name="type-equipement" required>
                        <option value="">Séléctionner le type</option>
                        <?php foreach($typesEquipement as $t): ?>
                            <option value=<?= e($t["type_equipement"]) ?>><?= e($t["type_equipement"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Lieu d'affectation : <b>*</b></label><br>
                    <select name="banc" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>">
                            Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
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
                <?php else: ?>
                <input type="hidden" name="date-achat"/>
                <input type="hidden" name="id-fournisseur"/>
                <?php endif ?>

                <div class="preview">
                    <label>Photo : <b>*</b></label></br>
                    <img class = "photo hide" id="photo-ajout" src=""></img>
                    <p>Aucun fichier séléctionné</p>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu file" for="file-ajout">Ajouter une photo</label>
                    <input class="hide" id="file-ajout" type="file" name="lien-photo" accept="image/*" capture="environment" required/>
                </div>

                <div>
                    <label>Infos supplémentaires :</label></br>
                    <textarea name="commentaires" id="saisie-materiel"></textarea>
                </div>

                <div class="input">
                    <input class="bouton vert" type="submit" value="Ajouter"/>
                </div>
            </form>

<?php require "view_end.php"; ?>