<?php

require "src/models/auth.php";

if (isset($_POST['signup'])) {
    if (!empty($_POST['username']) and !empty($_POST['mdp']) AND !empty($_POST['complete_name']) AND !empty($_POST['matricule']) AND !empty($_POST['email'])) {
        
        // Vérifier si le nombre des caractères mot de passe saisi
        // est supérieur ou égal à 6, puis exécuter la fonction de créaction des comptes 
        if (strlen($_POST['mdp'])>=6) {
            setSigned($_POST['username'], $_POST['mdp'], $_POST['complete_name'], $_POST['matricule'], $_POST['email'], $_POST['promotion']);
        } else {
            $_SESSION['msg'] = "Le mot de passe doit avoir au moins 6 caractères !";
        }
          
    }else{
        $_SESSION['msg'] = "Remplissez tous les champs";
    }
}
 
require "src/views/auth/signup.php";