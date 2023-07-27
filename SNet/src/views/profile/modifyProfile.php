<?php
$title = "Modifier mon profil";

ob_start();

require "src/views/includes/header.php";
?>
<main>
    <form action="" method="post">
        <div class="container">
            <br>
            <h2>Modifier mes informations</h2>
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe actuel</label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="new_mdp">Nouveau de passe</label>
                <input type="text" class="form-control" name="new_mdp" id="" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="confirm_mdp">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="confirm_mdp" id="confirm_mdp" placeholder="" required>
            </div>
            
            <br>
            
            <h2>Informations complémentaires</h2>
            <div>
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" class="form-control" name="name" placeholder="ex. Jules-César L.">
                </div>
            </div>

            <br>
            <button type="submit" name="validate" class="btn btn-primary">Valider</button>
        </div>
    </form>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>