<?php

function getMyFriends(){
    require "src/models/pdo.php";
    // Requête pour récupérer les amis de l'utilisateur
    // Si c'est lui qui avait fait la demande d'ami, 
    // celle-ci est récupérée, si la demande lui était adressée, elle est récupérée
    
    $sql = $bdd->prepare("SELECT * FROM my_friends WHERE username = ? OR friend=?");
    
    // Nom de l'utilisateur
    $username = $_SESSION['username'];
    $sql->execute(array($username,$username));
    
    if ($sql->rowCount()>0) {
        while ($res = $sql->fetch()) {

            // Si le demandé était l'utilisateur, on récupère le demandant
            if ($res['friend']==$username) {
                $friends[] = getProfile($res['username']);
            }
            // Sinon on récupère démandé
            else{
                $friends[] = getProfile($res['friend']);
            }
            // Tout cela pour ne récupérer que les infos sur les amis de l'utilisateur
        }
        return $friends;
    }
}
function isMyFriend($friend_username){
    require "src/models/pdo.php";
    $sql = $bdd->prepare("SELECT * FROM my_friends WHERE username = ? OR friend=?");
    
    $username = $_SESSION['username'];
    $sql->execute(array($username,$username));

    if ($sql->rowCount()>0) {
        while ($res = $sql->fetch()) {

            if ($res['friend']==$username) {
                $friends[] =  $res['username'];
            }else{
                $friends[] = $res['friend'];
            }
        }
        if (in_array($friend_username, $friends)) {
            return true;
        }else {
            return false;
        }
    }
    
}
function getProfile($username){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("SELECT * FROM users WHERE username=?");
    $sql->execute(array($username));
    $res = $sql->fetch();

    $userInfos = [
        'username' => $res['username'],
        'email' => $res['email'],
        'promotion' => $res['promotion'],
        'complete_name' => $res['complete_name'],
        'img' => $res['img'],
    ];

    return $userInfos;
    
}

function getAllUsers(){
    
    require "src/models/pdo.php";

    $sql = $bdd->query("SELECT * FROM users WHERE NOT username='admin' ORDER BY username");
    while ($res = $sql->fetch()) {
        $users[] = [
            'id' => $res['id'],
            'username' => $res['username'],
            'complete_name' => $res['complete_name'],
        ];
    }

    return $users;
}

function setFriendRequest($future_friend_username){
    
    require "src/models/pdo.php";
    
    $username = $_SESSION['username'];

    $sql = $bdd->prepare("INSERT INTO friend_request(username, future_friend_username) VALUES(?,?)");
    
    $isRequeted = $bdd->prepare("SELECT * FROM friend_request WHERE username=? AND future_friend_username=?");
    $isRequeted->execute(array($username, $future_friend_username));

    if ($isRequeted->rowCount()==0) {
        $sql->execute(array($username, $future_friend_username));
    }    
    // Rédirection
    header("Location:index.php?profile-for=" . $future_friend_username);
    exit();
}

function getFriendRequests(){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM friend_request WHERE future_friend_username = ? ORDER BY id DESC");
    $sql->execute(array($_SESSION['username']));

    if ($sql->rowCount()>0) {
        while ($res = $sql->fetch()) {
            $requests[] = [
                'username' => $res['username'],
                'img' => getProfile($res['username'])['img']
            ];
        }
        return $requests;
    }
}
function isExistRequest($friend_username){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM friend_request WHERE (username=? AND future_friend_username = ?) OR (username=? AND future_friend_username = ?)");
    $sql->execute(array($_SESSION['username'], $friend_username, $friend_username, $_SESSION['username']));

    if($sql->rowCount()>0){
        $res = $sql->fetch();
        // S'il y a une demande d'ami, retourner le nom d'utilisateur de celui qui l'a faite
        $requester = $res['username'];
        return $requester;
    }else{
        return false;
    }
}
function confirmFriendRequest($friend_username){

    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("INSERT INTO my_friends(username,friend) VALUES(?,?)");
    $sql->execute(array($_SESSION['username'], $friend_username));
    
    // Suppression de la demande après confirmation

    $sql = $bdd->prepare("DELETE FROM friend_request WHERE (username=? AND future_friend_username=?) OR (username=? AND future_friend_username=?)");
    $sql->execute(array($friend_username, $_SESSION['username'], $_SESSION['username'], $friend_username));

    // Rédirection
    header("Location:index.php?profile-for=$friend_username");
    exit();
}
function updateAvatar($new_file_name){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("UPDATE users SET img=? WHERE username=?");
    $sql->execute(array($new_file_name, $_SESSION['username']));
}
function refuseFriendRequest($friend_username){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("DELETE FROM friend_request WHERE (username=? AND future_friend_username=?) OR (username=? AND future_friend_username=?)");
    $sql->execute(array($friend_username, $_SESSION['username'], $_SESSION['username'], $friend_username));

    // Rédirection
    header("Location:index.php?profile-for=$friend_username");
    exit();
}