<?php require "view_begin.php"; ?>

            <h2>MODIFIER UN ÉQUIPEMENT</h2>
            <form method="post" id="form-modif-materiel">
                <div>
                    <label>Matériel à modifier :</label></br>
                    <select name="id-equipement">
                        <option value="">Séléctionner le matériel</option>
                        <option value="T63-L9">Oscilloscope T63-L9</option>
                        <option value="K98-6A">Multimètre K98-6A</option>
                        <option value="A46-JF">GBF A46-JF</option>
                        <option value="P30-MN">Alimentation P30-MN</option>
                    </select>
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

                <div>
                    <label>Photo :</label></br>
                    <img class="photo" id="photo-modif" src="Content/img/oscilloscope1.jpg" alt="oscilloscope"/>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu" for="file-modif">Modifier la photo</label>
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