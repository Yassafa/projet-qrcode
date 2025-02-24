<?php require "view_begin.php"; ?>

            <h2>MODIFIER UN ÉQUIPEMENT</h2>
            <form action="?controller=admin&action=update_materiel" method="post" id="form-modif-materiel" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <label>Matériel à modifier :</label><br>
                    <select name="id-equipement" class="refMateriel" required>
                        <option value="">Séléctionner le matériel</option>
                        <?php foreach($equipements as $e): ?>
                            <option value="<?= e($e["id_equipement"]) ?>"
                            <?php if($materielDefaut == e($e["id_equipement"])): ?>selected<?php endif ?>>
                                <?= e($e["type_equipement"]) ?> <?= e($e["id_equipement"]) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Type d'équipement :</label><br>
                    <select name="type-equipement" required>
                        <option value="">Séléctionner le type</option>
                        <?php foreach($typesEquipement as $t): ?>
                            <option value="<?= e($t["type_equipement"]) ?>"
                            <?php if($infosDefaut && $infosDefaut["type_equipement"] == e($t["type_equipement"])): ?>
                            selected<?php endif ?>>
                                <?= e($t["type_equipement"]) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="lieu-affectation">
                    <label>Lieu d'affectation :</label>
                    <input class="saisie" type="text" name="id-banc" placeholder="N°banc" 
                    <?php if($infosDefaut): ?>value="<?= e($infosDefaut["id_banc_affectation"]) ?>"<?php endif ?> required/>
                    <select class="petit" name="id-salle" required>
                        <option value="">Salle</option>
                        <?php foreach($salles as $s): ?>
                            <option value="<?= e($s["id_salle"]) ?>"
                            <?php if($infosDefaut && $infosDefaut["id_salle_affectation"] == e($s["id_salle"])): ?> selected
                            <?php endif ?>><?= e($s["nom_salle"])?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Date d'achat :</label><br>
                    <input class="date" type="date" name="date-achat"
                    <?php if($infosDefaut): ?> value="<?= e($infosDefaut["date_achat"]) ?>"
                    <?php endif ?>/>
                </div>

                <div>
                    <label>Fournisseur :</label><br>
                    <select name="id-fournisseur">
                        <option value="">Sélectionner le fournisseur</option>
                        <?php foreach($fournisseurs as $f): ?>
                            <option value="<?= e($f["id_fournisseur"]) ?>"
                            <?php if($infosDefaut && $infosDefaut["id_fournisseur"] == e($f["id_fournisseur"])): ?>
                            selected<?php endif ?>>
                                <?= e($f["nom_fournisseur"]) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="preview">
                    <label>Photo :</label><br>
                    <img class="photo" id="photo-modif" 
                    <?php if($infosDefaut): ?>
                    src="<?= e($infosDefaut["lien_photo"])?>"
                    <?php endif ?> alt=""/>
                    <p></p>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu file" for="file-modif">Modifier la photo</label>
                    <input class="hide" id="file-modif" type="file" name="lien-photo" accept="image/*" capture="environment"/>
                </div>

                <div>
                    <label>Infos supplémentaires (optionnel) :</label><br>
                    <textarea name="commentaires" id="saisie-materiel"><?php if($infosDefaut): ?><?= e($infosDefaut["infos_sup"]) ?><?php endif ?></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Enregistrer les modifications"/>
                </div>
            </form>

<?php require "view_end.php"; ?>