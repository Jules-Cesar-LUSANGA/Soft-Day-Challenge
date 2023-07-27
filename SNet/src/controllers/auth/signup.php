<?php

require "src/models/auth.php";

if (isset($_POST['signup'])) {
    if (!empty($_POST['username']) and !empty($_POST['mdp'])) {
        
        if (strlen($_POST['mdp'])>=6) {
            setSigned($_POST['username'], $_POST['mdp']);
        } else {
            $_SESSION['msg'] = "Le mot de passe doit avoir au moins 6 caractères !";
        }
        
        
    }else{
        $_SESSION['msg'] = "Remplissez tous les champs";
    }
}

require "src/views/auth/signup.php";