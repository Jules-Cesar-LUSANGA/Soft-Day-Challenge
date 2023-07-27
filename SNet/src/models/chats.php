<?php

function getMessages(){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM chats WHERE (sender=? AND receiver=?) OR (sender=? AND receiver=?)");
    
    $username = $_SESSION['username'];
    $friend_username = $_GET['chat-to'];
    
    $sql->execute(array($username, $friend_username, $friend_username, $username));

    if($sql->rowCount()>0){
        
        while ($res = $sql->fetch()) {

            $messages[] = [
                'id'=>$res['id'],
                'sender'=>$res['sender'],
                'message'=>$res['msg'],
            ];

        }
        
        return $messages;
    }
}

function getRecentMsg(){
    // Connexion à la base de données
    require "src/models/pdo.php";
    require "src/models/users.php";
    // Exécution de la requête sql
    $sql = $bdd->prepare("SELECT * FROM chats WHERE (sender=? AND receiver=?) OR (sender=? AND receiver=?) ORDER BY id DESC LIMIT 0,1");
    // Récupération des amis de l'utilisateur courant
    $my_friends = getMyFriends();
    $username = $_SESSION['username'];
    
    // Récupération des messages que chaque ami en envoiyé
    foreach ($my_friends as $my_friend) {
        
        $friend_username = $my_friend['username'];
        
        $sql->execute(array($username, $friend_username, $friend_username, $username));
        // Stockage des messages s'ils exsitents
        if($sql->rowCount()>0){
            $msg = $sql->fetch();

            $recentMsg[] = [
                'id'=>$msg['id'],
                'sender'=>$msg['sender'],
                'receiver'=>$msg['receiver'],
                'message'=>$msg['msg'],
            ];
        }
    }
    
    return $recentMsg;
}

function sendMessage($sender, $receiver, $message){
    
    require "src/models/pdo.php";

    $msg_date = Date("Y/m/d H:i:s");
    
    $sql = $bdd->prepare("INSERT INTO chats(sender,receiver,msg,msg_date) VALUES(?,?,?,?)");
    $sql->execute(array($sender,$receiver, $message,$msg_date));
    
    $sql = $bdd->prepare("SELECT id FROM chats WHERE msg=?");
    $sql->execute(array($message));
    
    $msg_id = $sql->fetch();
    $msg_id = $msg_id['id'];
    $_SESSION['msg_sent'] = [time(), $msg_id];
    
    header("Location:index.php?chat-to=".$receiver);
}

function deleteMsg($msg_id){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("DELETE FROM chats WHERE id=?");
    $sql->execute(array($msg_id));
}