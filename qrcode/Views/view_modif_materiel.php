<?php require "view_begin.php"; ?>

            <h2>MODIFIER UN ÉQUIPEMENT</h2>
            <form action="?controller=admin&action=update_materiel" method="post" id="form-modif-materiel" autocomplete="off">
                <div>
                    <label>Matériel à modifier :</label></br>
                    <select name="id-equipement" required>
                        <option value="">Séléctionner le matériel</option>
                        <?php foreach($equipements as $e): ?>
                            <option value="<?= e($e["id_equipement"]) ?>"><?= e($e["type_equipement"]) ?> <?= e($e["id_equipement"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Type d'équipement :</label></br>
                    <select name="type-equipement" required>
                        <option value="">Séléctionner le type</option>
                        <?php foreach($typesEquipement as $t): ?>
                            <option value="<?= e($t["type_equipement"]) ?>"><?= e($t["type_equipement"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="lieu-affectation">
                    <label>Lieu d'affectation :</label>
                    <input class="saisie" type="text" name="id-banc" placeholder="N°banc" required/>
                    <select class="petit" name="id-salle" required>
                        <option value="">Salle</option>
                        <?php foreach($salles as $s): ?>
                            <option value="<?= e($s["id_salle"]) ?>"><?= e($s["nom_salle"])?>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Date d'achat :</label></br>
                    <input class="date" type="date" name="date-achat"/>
                </div>

                <div>
                    <label>Fournisseur :</label></br>
                    <select name="id-fournisseur">
                        <option value="">Sélectionner le fournisseur</option>
                        <?php foreach($fournisseurs as $f): ?>
                            <option value="<?= e($f["id_fournisseur"]) ?>"><?= e($f["nom_fournisseur"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="preview">
                    <label>Photo :</label></br>
                    <img class="photo" id="photo-modif" src="" alt=""/>
                    <p></p>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu file" for="file-modif">Modifier la photo</label>
                    <input class="hide" id="file-modif" type="file" name="lien-photo" accept="image/*" capture="environment"/>
                </div>

                <div>
                    <label>Infos supplémentaires (optionnel) :</label></br>
                    <textarea name="commentaires" id="saisie-materiel"></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Enregistrer les modifications"/>
                </div>
            </form>

<?php require "view_end.php"; ?>