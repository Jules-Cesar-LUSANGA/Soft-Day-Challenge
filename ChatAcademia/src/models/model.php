<?php
// session_start();

function getUsers(){
    
    require "src/models/pdo.php";
    $sql = $bdd->query("SELECT * FROM users ORDER BY username");
    $users = [];
    while ($res = $sql->fetch()) {
        $users[] = [
                    'id' => $res['id'],
                    'username' => $res['username'],
                    'complete_name' => $res['complete_name'],

                    ];
    }

    return $users;
}





// function getMyFriends(){
//     require "src/models/pdo.php";
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