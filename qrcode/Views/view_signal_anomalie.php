<?php require "view_begin.php" ?>

            <h2>SIGNALER UNE ANOMALIE</h2>
            <form action="?controller=signal_anomalie&action=insert" method="post" id="form-anomalie" autocomplete="off">
                <div>
                    <label>Matériel  :</label>
                    <select name="id-equipement" required>
                        <option value="">Séléctionner le matériel</option>
                        <?php foreach($equipements as $e): ?>
                            <option value="<?= e($e["id_equipement"]) ?>"><?= e($e["type_equipement"]) ?> <?= e($e["id_equipement"]) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div>
                    <label>Type d'anomalie : </label><br>
                    <?php foreach($typesAnomalie as $t): ?>
                        <input type="radio" name="type-anomalie" value="<?= e($t["type_anomalie"]) ?>" required><label><?= e($t["type_anomalie"]) ?></label>
                    <?php endforeach ?>
                </div>
                
                <div class="preview">
                    <label>Photo :</label></br>
                    <img class = "photo hide" id="photo-anomalie" src="" alt="apercu"></img>
                    <p>Aucun fichier séléctionné</p>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu file" for="file-anomalie">Ajouter une photo</label>
                    <input class="hide" id="file-anomalie" type="file" name="lien-photo" accept="image/*" capture="environment"/>
                </div>

                <div>
                    <label>Description du problème :</label><br>
                    <textarea name="description-anomalie" id="saisie-anomalie"></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Envoyer"/>
                </div>
            </form>

<?php require "view_end.php" ?>