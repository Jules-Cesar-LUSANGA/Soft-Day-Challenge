<?php
require "src/models/chats.php";

$users = getUsers();

require "src/views/chats/users_list.php";