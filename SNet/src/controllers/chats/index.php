<?php
require "src/models/chats.php";

$messages = getRecentMsg();

require "src/views/chats/index.php";