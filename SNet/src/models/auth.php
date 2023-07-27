<?php
function setLoged($username, $mdp) {
    // Connexion à la base de données
    require "src/models/pdo.php";
    // Exécution de la requête sql
    $sql = $bdd->prepare("SELECT * FROM users WHERE username=?");
    $sql->execute(array($username));

    // Récupération du mot de passe de l'utilisateur
    $res = $sql->fetch();
    $password = $res['mdp'];
    
    // Vérifier si le username est dans la base de données
    if ($sql->rowCount()==1 ) {

        if ($password == $mdp) {

            $_SESSION['username'] = $username;
            header("Location:index.php?home");

        }else {
            echo "Mot de passe incorrect !";
        }
    }else {
        echo "Nom d'utilisateur incorrect !";
    }
}

function setSigned($username, $mdp) {
    // Connexion à la base de données
    require "src/models/pdo.php";
    // Exécution de la requête sql
    $sql = $bdd->prepare("INSERT INTO users(username,mdp) VALUES(?,?)");
    $exist_user = $bdd->prepare("SELECT * FROM users WHERE username=?");
    $exist_user->execute(array($username));

    // Vérifier si le username est déjà utilisé
    if ($exist_user->rowCount()==0) {
        
        $sql->execute(array($username,$mdp));
        header("Location:index.php?home");

    } else {
        $_SESSION['msg'] = "Veuillez choisir un autre nom d'utilisateur !";
    }
}
