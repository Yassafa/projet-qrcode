<?php require "view_begin.php"; ?>

            <h2>SUPPRIMER UN BANC</h2>
            <form method="post" id="form-sup-banc">
                <div class="lieu-affectation">
                    <label>N° banc :</label></br>
                    <input class="saisie" type="text" name="id-banc" placeholder="N°"/>
                    <label id="label-salle">Salle :</label></br>
                    <select class="petit" name="id-salle">
                        <option value="">Salle</option>
                        <option value="1">Q202</option>
                        <option value="2">Q204</option>
                        <option value="3">Q206</option>
                        <option value="4">Q208</option>
                    </select>
                </div>

                <div class="input">
                    <input class="bouton rouge" type="submit" value="Supprimer"/>
                </div>
            </form>

<?php require "view_end.php"; ?>