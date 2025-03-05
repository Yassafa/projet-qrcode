<?php require "view_begin.php"; ?>

            <h2>MODIFIER UN BANC</h2>
            <form action="?controller=admin&action=update_banc" method="post" id="form-modif-banc" autocomplete="off">
                <div>
                    <label>Banc à modifier :</label><br>
                    <select name="banc" class="refBanc" required>
                        <option value="">Séléctionner le banc</option>
                        <?php foreach($bancs as $b): ?>
                            <option value="<?= e($b["id_banc"]) ?>, <?= e($b["id_salle"]) ?>"
                            <?php if($bancDefaut == e($b["id_banc"]) && $salleDefaut == e($b["id_salle"])): ?>
                                selected<?php endif ?>>
                            Banc <?= e($b["id_banc"]) ?> - <?= e($b["nom_salle"]) ?></option>
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
                            <?= e($f["nom_fournisseur"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Infos supplémentaires (optionnel) :</label><br>
                    <textarea name="commentaires" id="saisie-banc"><?php if($infosDefaut): ?><?= e($infosDefaut["commentaires"]) ?><?php endif ?></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Enregistrer les modifications"/>
                </div>
            </form>

<?php require "view_end.php"; ?>