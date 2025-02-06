<?php require "view_begin.php" ?>

            <h2>SIGNALER UNE ANOMALIE</h2>
            <form method="post" id="form-anomalie">
                <div>
                    <label>Matériel  : </label>
                    <select name="id-equipement">
                        <option value="">Séléctionner le matériel</option>
                        <option value="T63-L9">Oscilloscope T63-L9</option>
                        <option value="K98-6A">Multimètre K98-6A</option>
                        <option value="A46-JF">GBF A46-JF</option>
                        <option value="P30-MN">Alimentation P30-MN</option>
                    </select>
                </div>

                <div>
                    <label>Type d'anomalie : </label></br>
                    <input type="radio" name="type-anomalie" value="panne"/><label>Panne</label>
                    <input type="radio" name="type-anomalie" value="disparition"/><label>Disparition</label>
                </div>
                
                <div class="input">
                    <label class = "bouton bleu" for="file-anomalie">Ajouter une photo</label>
                    <input class="hide" id= "file-anomalie" type="file" name="lien-photo" accept="image/*" capture="environment"/>
                </div>

                <div>
                    <label>Description du problème :</label></br>
                    <textarea name="description-anomalie" id="saisie-anomalie"></textarea>
                </div>

                <div class="input">
                    <input class="bouton bleu" type="submit" value="Envoyer"/>
                </div>
            </form>

<?php require "view_end.php" ?>