<?php

function getMyFriends(){
    require "src/models/pdo.php";
    $sql = $bdd->prepare("SELECT * FROM my_friends WHERE username = ? OR friend=?");
    
    $username = $_SESSION['username'];
    $sql->execute(array($username,$username));

    if ($sql->rowCount()>0) {
        while ($res = $sql->fetch()) {

            if ($res['friend']==$username) {
                $friends[] = ['username' => $res['username']];
            }else{
                $friends[] = ['username' => $res['friend']];
            }
        }
        return $friends;
    }
}

function getProfile($username){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("SELECT * FROM users WHERE username=?");
    $sql->execute(array($username));
    $res = $sql->fetch();

    $userInfos = [
        'username' => $res['username'],
    ];

    return $userInfos;
    
}

function getAllUsers(){
    
    require "src/models/pdo.php";

    $sql = $bdd->query("SELECT * FROM users ORDER BY username");
    
    while ($res = $sql->fetch()) {
            $users[] = ['username' => $res['username']];
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
    header("Location:index.php?usersList");
    exit();
}

function getFriendRequests(){
    require "src/models/pdo.php";

    $sql->execute(array($_SESSION['username']));

    if ($sql->rowCount()>0) {
        while ($res = $sql->fetch()) {
            $requests[] = [
                'username' => $res['username']
            ];
        }
        return $requests;
    }
}

function confirmFriendRequest($friend_username){

    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("INSERT INTO my_friends(username,friend) VALUES(?,?)");
    $sql->execute(array($_SESSION['username'], $friend_username));
    
    // Suppression de la demande après confirmation

    $sql = $bdd->prepare("DELETE FROM friend_request WHERE username=? AND future_friend_username=?");
    $sql->execute(array($friend_username, $_SESSION['username']));

    // Rédirection
    header("Location:index.php?friendRequests");
    exit();
}

function refuseFriendRequest($friend_username){

    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("DELETE FROM friend_request WHERE username=? AND future_friend_username=?");
    $sql->execute(array($friend_username, $_SESSION['username']));

    // Rédirection
    header("Location:index.php?friendRequests");
    exit();
}