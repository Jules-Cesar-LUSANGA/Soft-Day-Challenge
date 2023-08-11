<?php
require "src/models/users.php";

// Récupérer toutes les démandes d'ami
$requests = getFriendRequests();

require "src/views/friends/friendRequests.php";