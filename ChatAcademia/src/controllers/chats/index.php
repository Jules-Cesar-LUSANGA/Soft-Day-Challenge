<?php
require "src/models/chats.php";

// Récupérer tous les messages que l'utilisateur s'est échangé avec ses amis

$recentMessages = getRecentMsg();

require "src/views/chats/index.php";