<?php
$title = "Inscription";

ob_start();
?>
<div class="container">
    <form action="" method="post">
        <h3>Rejoindre SNet</h3>
        <div class="form-group">
            <label for="username">Nom d'utilisateur : </label>
            <input type="text" class="form-control" name="username"><br>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password" class="form-control" name="mdp"><br>
        </div>
        <div class="form-group">
            <input type="submit" value="S'inscrire" name="signup"><br>
            <a href="index.php?login">Déjà membre ?</a>
        </div>
        <?php

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        ?>       
    </form>
</div>
<?php 

$content=ob_get_clean();
require "src/views/layout.php";
?>