<?php require "view_begin.php"; ?>

            <h2>SUPPRIMER UN ÉQUIPEMENT</h2>
            <form action="?controller=admin&action=del_materiel" method="post" id="form-sup-materiel" autocomplete="off">
                <div class="autocomplete">
                    <label>Identifiant : <b>*</b></label><br>
                    <input id="sup-materiel" class="saisie" type="text" name="id-equipement" placeholder="Id" 
                    <?php if($materielDefaut): ?>value="<?= e($materielDefaut) ?>" <?php endif ?>required/>
                    <input type="hidden" id="liste-equipements" value="<?= e(json_encode($equipements)) ?>"/>
                </div>

                <div class="input">
                    <input class="bouton rouge" type="submit" value="Supprimer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>