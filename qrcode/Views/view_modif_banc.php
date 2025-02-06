<?php require "view_begin.php"; ?>

            <h2>MODIFIER UN BANC</h2>
            <form method="post" id="form-modif-banc">
                <div>
                    <label>Banc à modifier  : </label></br>
                    <select name="banc">
                        <option value="">Séléctionner le banc</option>
                        <option value="1,2">Banc N°1 - Q204</option>
                        <option value="2,2">Banc N°2 - Q204</option>
                        <option value="1,3">Banc N°1 - Q206</option>
                        <option value="2,3">Banc N°2 - Q206</option>
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
                    <label>Infos supplémentaires (optionnel) :</label></br>
                    <textarea name="commentaires" id="saisie-banc"></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Enregistrer les modifications"/>
                </div>
            </form>

<?php require "view_end.php"; ?>