<?php
$title = "Connexion";

ob_start();
?>
<div>
    <form action="" class="container" method="post">
        <h3>Connexion à SNet</h3>
        <div class="form-group">
            <label for="username">Nom d'utilisateur : </label>
            <input type="text" class="form-control" name="username"><br>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password"  class="form-control" name="mdp"><br>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Se connecter" name="login"><br>
            <a href="index.php?signup">Pas encore membre ?</a>
        </div>
    </form>
</div>
<?php 

$content=ob_get_clean();
require "src/views/layout.php";
?>