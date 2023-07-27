<?php
require "src/models/users.php";

if (isset($_GET['add_friend']) and !empty($_GET['add_friend'])) {
    // Récupération de l'id du futur ami
    setFriendRequest($_GET['add_friend']);
}