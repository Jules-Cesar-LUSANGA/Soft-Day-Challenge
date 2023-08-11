<?php
require "src/models/users.php";

// Récupérer les amis de l'utilisateur
$friends = getMyFriends();

require "src/views/friends/myFriends.php";