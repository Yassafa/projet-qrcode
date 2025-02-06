<?php require "view_begin.php"; ?>

            <h2>AJOUTER UN ÉQUIPEMENT</h2>
            <form method="post" id="form-ajout-materiel">
                <div>
                    <label>Identifiant :</label></br>
                    <input class="saisie" type="text" name="id-equipement" placeholder="Id"/>
                </div>

                <div>
                    <label>Type d'équipement :</label></br>
                    <select name="type-equipement">
                        <option value="">Séléctionner le type</option>
                        <option value="oscilloscope">Oscilloscope</option>
                        <option value="multimètre">Multimètre</option>
                        <option value="GBF">GBF</option>
                        <option value="alimentation">Alimentation</option>
                    </select>
                </div>

                <div class="lieu-affectation">
                    <label>Lieu d'affectation :</label>
                    <input class="saisie" type="text" name="id-banc" placeholder="N°banc"/>
                    <select class="petit" name="id-salle">
                            <option value="">Salle</option>
                            <option value="1">Q202</option>
                            <option value="2">Q204</option>
                            <option value="3">Q206</option>
                            <option value="4">Q208</option>
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
                        <option value="1">Electro Depot</option>
                    </select>
                </div>

                <div class="input">
                    <label class = "bouton bleu" for="file-ajout">Ajouter une photo</label>
                    <input class="hide" id="file-ajout" type="file" name="lien-photo" accept="image/*" capture="environment"/>
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