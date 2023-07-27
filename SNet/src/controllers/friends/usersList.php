<?php
require "src/models/users.php";

$users = getAllUsers();

require "src/views/friends/usersList.php";