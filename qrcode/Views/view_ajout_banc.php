<?php require "view_begin.php"; ?>

            <h2>AJOUTER UN BANC</h2>
            <form method="post" id="form-ajout-banc">
                <div>
                    <label>N° banc :</label></br>
                    <input class ="saisie" type="text" name="id-banc" placeholder="N°"/>
                </div>

                <div>
                    <label>Salle :</label></br>
                    <input class ="saisie" type="text" name="id-salle" placeholder="Salle"/>
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
                    <input class="bouton vert" type="submit" value="Ajouter"/>
                </div>
            </form>

<?php require "view_end.php"; ?>