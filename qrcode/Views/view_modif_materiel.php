<?php require "view_begin.php"; ?>

            <h2>MODIFIER UN ÉQUIPEMENT</h2>
            <form action="?controller=admin&action=update_materiel" method="post" id="form-modif-materiel" autocomplete="off" enctype="multipart/form-data">
                <div>
                    <label>Matériel à modifier : <b>*</b></label><br>
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
                    <label>Lieu d'affectation : <b>*</b></label><br>
                    <select name="banc" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>"
                            <?php if($infosDefaut && $infosDefaut["id_banc_affectation"] == e($b["id_banc"]) && $infosDefaut["id_salle_affectation"] == e($b["id_salle"])): ?> 
                                selected<?php endif ?>>
                            Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>État : <b>*</b></label><br>
                    <select name="etat" required>
                        <option value="">Modifier l'état</option>
                        <?php foreach($etats as $etat): ?>
                            <option value="<?= e($etat["etat"]) ?>"
                            <?php if($infosDefaut && $infosDefaut["etat"] == e($etat["etat"])): ?>
                                selected<?php endif ?>>
                            <?= e($etat["etat"]) ?></option>
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
                    <label>Photo : <b>*</b></label><br>
                    <img id="photo-modif" <?php if($infosDefaut): ?>
                    class="photo" src="<?= e($infosDefaut["lien_photo"])?>"
                    <?php else: ?> class="photo hide"
                    <?php endif ?> alt="apercu"/>
                    <p></p>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu file" for="file-modif">Modifier la photo</label>
                    <input class="hide" id="file-modif" type="file" name="lien-photo" accept="image/*" capture="environment"/>
                </div>

                <div>
                    <label>Infos supplémentaires :</label><br>
                    <textarea name="commentaires" id="saisie-materiel"><?php if($infosDefaut): ?><?= e($infosDefaut["infos_sup"]) ?><?php endif ?></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Enregistrer les modifications"/>
                </div>
            </form>

<?php require "view_end.php"; ?>