<?php
require "src/models/auth.php";

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) and !empty($_POST['mdp'])) {
        setLoged($_POST['username'], $_POST['mdp']);
    }else {
        echo "Il faut remplir tous les champs";
    }
}

require "src/views/auth/login.php";