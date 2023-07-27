<?php
// session_start();

function getUsers(){
    
    $bdd = new PDO("mysql:host=127.0.0.1; dbname=snet; charset=utf8","root","");
    $sql = $bdd->query("SELECT * FROM users ORDER BY username");
    
    while ($res = $sql->fetch()) {
        $users[] = $res['username'];
    }

    return $users;
}





// function getMyFriends(){
//     $bdd = new PDO("mysql:host=127.0.0.1; dbname=snet; charset=utf8","root","");
//     $sql = $bdd->prepare("SELECT * FROM my_friends WHERE username = ? OR friend=?");
    
//     $username = $_SESSION['username'];
//     $sql->execute(array($username,$username));

//     if ($sql->rowCount()>0) {
//         while ($res = $sql->fetch()) {

//             if ($res['friend']==$username) {
//                 $friends[] = ['username' => $res['username']];
//             }else{
//                 $friends[] = ['username' => $res['friend']];
//             }
//         }
//         return $friends;
//     }
// }
function isMyFriend($friend_username){
    $bdd = new PDO("mysql:host=127.0.0.1; dbname=snet; charset=utf8","root","");
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