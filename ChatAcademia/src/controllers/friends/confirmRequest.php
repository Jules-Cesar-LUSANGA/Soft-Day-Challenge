<?php
require "src/models/users.php";

if (isset($_GET['confirmRequest']) and !empty($_GET['confirmRequest'])) {
    // Récupération de l'id du futur ami
    confirmFriendRequest($_GET['confirmRequest']);

}