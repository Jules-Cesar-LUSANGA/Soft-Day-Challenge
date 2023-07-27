<?php
require "src/models/users.php";

$requests = getFriendRequests();

require "src/views/friends/friendRequests.php";