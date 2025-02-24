<?php require "view_begin.php" ?>
            
            <h2>MODIFIER LA BASE DE DONNÉES</h2>
            <div id="tableau-boutons">
                <a class="bouton vert" id="ajout-banc" href="?controller=admin&action=ajout_banc">Ajouter un banc</a>
                <a class="bouton vert" id="ajout-materiel" href="?controller=admin&action=ajout_materiel">Ajouter un équipement</a>

                <a class="bouton rouge" id="sup-banc" href="?controller=admin&action=supprimer_banc">Supprimer un banc</a>
                <a class="bouton rouge" id="sup-materiel" href="?controller=admin&action=supprimer_materiel">Supprimer un équipement</a>

                <a class="bouton bleu" id="modif-banc" href="?controller=admin&action=modifier_banc">Modifier un banc</a>
                <a class="bouton bleu" id="modif-materiel" href="?controller=admin&action=modifier_materiel">Modifier un équipement</a>
            </div>

<?php require "view_end.php" ?>