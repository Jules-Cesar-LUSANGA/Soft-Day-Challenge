<?php
require "src/models/users.php";

if (isset($_SESSION['username'])) {
    
    if ($_GET['profile-for']=="me") {
        $userInfos = getProfile($_SESSION['username']);
    }else{
        $userInfos = getProfile($_GET['profile-for']);
    }
    require "src/views/profile/profile.php";

}