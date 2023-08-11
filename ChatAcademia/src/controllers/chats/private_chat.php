<?php
require "src/models/chats.php";

// Récupération des messages de l'utilisateur et son ami
$messages = getMessages();
$recentMessages = getRecentMsg();

// Envoi du message lorsque le bouton est appûyé
if(isset($_POST['send'])){
    if (isset($_POST['message']) and !empty($_POST['message'])) {
        sendMessage($_SESSION['username'], $_GET['chat-to'],$_POST['message']);
    }else{
        echo "Ecrivez quelque chose !";
    }
}

require "src/views/chats/private_chat.php";