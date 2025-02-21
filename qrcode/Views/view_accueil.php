<?php require "view_begin.php"; ?>

            <div id="home"><img class="icon" src="Content/img/Home.png" alt="home logo"/><h1>Accueil</h1></div>

            <form autocomplete="off">
                <div class="autocomplete">
                    <h2>RECHERCHER UN BANC</h2>
                    <input class="grand saisie" type="search" id="search-banc" placeholder="Recherche" name="banc" required/>
                    <input type="hidden" id="liste-bancs" value="<?= e(json_encode($bancs)) ?>"/>
                </div>
                <div class="input">
                    <input class="bouton bleu" type="submit" value="Rechercher"/>
                </div>
            </form>

            <form autocomplete="off">
                <div class="autocomplete">
                    <h2>RECHERCHER UN ÉQUIPEMENT</h2>
                    <input class="grand saisie" type="search" id="search-materiel" placeholder="Recherche" name="materiel" required/>
                    <input type="hidden" id="liste-equipements" value="<?= e(json_encode($equipements)) ?>"/>
                </div>
                <div class="input">
                    <input class="bouton bleu" type ="submit" value="Rechercher"/>
                </div>
            </form>

            <?php if(isset($_SESSION["connecte"]) && $_SESSION["role"] !== "Etudiant"): ?>
                <div class="input">
                    <a class="bouton vert" id="modif-bd" href="?controller=admin">Modifier la base de données</a>
                </div>
            <?php endif ?>

<?php require "view_end.php"; ?>