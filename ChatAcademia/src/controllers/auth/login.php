<?php
// Inclure le modèle d'authentification
require "src/models/auth.php";

// Vérifier si le bouton Se Connecter a été appuyé
if (isset($_POST['login'])) {
    // Vérifier si les champs nom d'utilisateur et mot de passe ne sont pas vides
    if (!empty($_POST['username']) and !empty($_POST['mdp'])) {
        
        if ($_POST['username']=="admin" AND $_POST['mdp']=="admin") {
            $_SESSION['username'] = "admin";
            header("Location:index.php?home");
        } else {
            setLoged($_POST['username'], $_POST['mdp']);
        }
        
    }else {
        $_SESSION['msg'] = "Il faut remplir tous les champs";
    }
}
// Inclure la vue de ce controlleur
require "src/views/auth/login.php";