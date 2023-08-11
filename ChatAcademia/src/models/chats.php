<?php
function getAvatar($username){
    require "src/models/pdo.php";
    $sql = $bdd->prepare("SELECT img FROM users WHERE username=?");
    $sql->execute(array($username));
    $res = $sql->fetch();

    // Retourner le nom et l'extension de l'avatar de l'utilisateur
    return $res['img'];
}
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
                'img'=>getAvatar($res['sender'])
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
    $sql = $bdd->prepare("SELECT * FROM `chats` WHERE (`sender`=? AND `receiver`=?) OR (`sender`=? AND `receiver`=?) ORDER BY id DESC LIMIT 0,1");
    
    // Récupération des amis de l'utilisateur courant
    $my_friends = getMyFriends();
    $username = $_SESSION['username'];
    
    $recentMsg=[];
    
    if(!empty($my_friends)){
        // Récupération des messages que chaque ami a envoyé
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
                    'date'=>$msg['msg_date'],
                    'img'=>getAvatar($friend_username)
                ];
            }
        }
    }

    return $recentMsg;
}

function sendMessage($sender, $receiver, $message){
    
    require "src/models/pdo.php";

    $sql = $bdd->prepare("INSERT INTO chats(sender,receiver,msg, msg_date) VALUES(?,?,?, now())");
    $sql->execute(array($sender,$receiver, $message));
    
    header("Location:index.php?chat-to=".$receiver);
}

function deleteMsg($msg_id){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("DELETE FROM chats WHERE id=?");
    $sql->execute(array($msg_id));
}