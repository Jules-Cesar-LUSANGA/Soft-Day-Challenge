<?php
require "src/models/forums.php";

$myQuestions = getMyQuestions($_SESSION['username'], $_GET['myQuestions']);

require "src/views/forums/actions/myQuestions.php";