<?php
require "src/models/users.php";

$friends = getMyFriends();

require "src/views/friends/myFriends.php";