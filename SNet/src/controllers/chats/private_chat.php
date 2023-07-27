<?php
require "src/models/chats.php";

$messages = getMessages();

// Envoi du message lorsque le bouton est appûyé
if(isset($_POST['send'])){
    if (isset($_POST['message']) and !empty($_POST['message'])) {
        sendMessage($_SESSION['username'], $_GET['chat-to'],$_POST['message']);
    }else{
        echo "Ecrivez quelque chose !";
    }
}
// Récupération du timestamp après l'envoi du message
if (isset($_SESSION['msg_sent'])) {
    $time = $_SESSION['msg_sent'][0];
    $msg_id = $_SESSION['msg_sent'][1];

    if ((time()-$time)<=120) {
        $btn = true;
    }
} else {
    $btn = false;
}

require "src/views/chats/private_chat.php";