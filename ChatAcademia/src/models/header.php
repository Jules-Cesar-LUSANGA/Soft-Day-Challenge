<?php
function getMyFriendsNbr(){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM my_friends WHERE username = ? OR friend=?");
    $sql->execute(array($_SESSION['username'], $_SESSION['username']));

    $rows = $sql->rowCount();
    return $rows;

}

function getClosedChatsNbr(){
    require "src/models/pdo.php";

    $sql = $bdd->query("SELECT id FROM chats_with_teachers WHERE question_status='closed'");
    $nb = $sql->rowCount();
    return $nb;
}

function getOpenedChatsNbr(){
    require "src/models/pdo.php";

    $sql = $bdd->query("SELECT id FROM chats_with_teachers WHERE question_status='opened'");
    $rows = $sql->rowCount();
    return $rows;
}

function getAllUsersNbr(){
    require "src/models/pdo.php";

    $sql = $bdd->query("SELECT id FROM users");
    $rows = $sql->rowCount();
    return $rows;
}

function getAllFriendRequestsNbr(){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM friend_request WHERE future_friend_username = ? ORDER BY id DESC");
    $sql->execute(array($_SESSION['username']));

    $rows = $sql->rowCount();

    return $rows;
}

function isWarned(){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT id FROM warnings WHERE username=?");
    
    // Vérifier si l'utilisateur est déjà connecté avant d'afficher le nombre de ses amis
    if(isset($_SESSION['username'])){
        $sql->execute(array($_SESSION['username']));
    }


    $warnings = $sql->rowCount();

    if ($warnings==0) {
        return false;
    }else{
        return true;
    }
}