<?php
require "src/models/users.php";
require "src/models/auth.php";

// Récupération de tous les utilisateurs du site
$users = getAllUsers();


require "src/views/admin/users/usersList.php";