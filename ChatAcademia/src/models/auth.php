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

        if(isExcluded($username)==true){
            $_SESSION['msg'] = "L'utilisateur est temporairement exclu";
        }else{

            if (password_verify($mdp, $password)) {

                $_SESSION['username'] = $username;
                
                $sql = $bdd->prepare("SELECT category FROM users WHERE username=?");
                $sql->execute(array($username));
                
                $res = $sql->fetch();
                $_SESSION['user_category'] = $res['category'];

                header("Location:index.php?home");

            }else {
                $_SESSION['msg'] = "Mot de passe incorrect !";
            }
        }
    }else {
        $_SESSION['msg'] = "Nom d'utilisateur incorrect !";
    }
}

function isExcluded($username){
    require "src/models/pdo.php";

    $isExcludedUser = $bdd->prepare("SELECT username FROM exclusions WHERE username=?");
    $isExcludedUser->execute(array($username));

    if($isExcludedUser->rowCount()==0){
        return false;
    }else{
        return true;
    }
}
function setSigned($username, $mdp, $complete_name, $matricule, $email, $promotion) {
    // Connexion à la base de données
    require "src/models/pdo.php";
    // Exécution de la requête sql
    $sql = $bdd->prepare("INSERT INTO users(username, mdp, complete_name, matricule, email, promotion, category, img) VALUES(?,?,?,?,?,?,'Etudiant', 'avatar.png')");
    $exist_user = $bdd->prepare("SELECT * FROM users WHERE username=?");

    $exist_user->execute(array($username));

    // Vérifier si le username est déjà utilisé ou exclu
    if ($exist_user->rowCount()==0) {
        
        if(isExcluded($username)==true){
            $_SESSION['msg'] = "L'utilisateur est temporairement exclu";
        }else{

            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            $username = htmlspecialchars($username);
            $matricule = htmlspecialchars($matricule);
            $email = htmlspecialchars($email);
            $promotion = htmlspecialchars($promotion);
            $complete_name = htmlspecialchars($complete_name);

            $sql->execute(array($username,$mdp, $complete_name, $matricule, $email, $promotion));

            $_SESSION['username'] = $username;
            $_SESSION['user_category'] = "Etudiant";

            header("Location:index.php?home");
        }

    } else {
        $_SESSION['msg'] = "Veuillez choisir un autre nom d'utilisateur !";
    }
}
