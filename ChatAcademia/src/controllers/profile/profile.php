<?php
require "src/models/users.php";

if ($_GET['profile-for']=="me") {
    // Récupérer les informations du profile de l'utilisateur
    $userInfos = getProfile($_SESSION['username']);
}else{
    // Ou l'autre utilisateur
    $userInfos = getProfile($_GET['profile-for']);
    // Récupérer true ou false, s'il y a une demande d'ami entre les deux
    $isExistRequest = isExistRequest($_GET['profile-for']);
}
require "src/views/profile/profile.php";