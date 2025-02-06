<?php require "view_begin.php"; ?>

            <h2>SUPPRIMER UN ÉQUIPEMENT</h2>
            <form method="post" id="form-sup-materiel">
                <div>
                    <label>Identifiant :</label></br>
                    <input class="saisie" type="text" name="id-equipement" placeholder="Id"/>
                </div>

                <div class="input">
                    <input class="bouton rouge" type="submit" value="Supprimer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>