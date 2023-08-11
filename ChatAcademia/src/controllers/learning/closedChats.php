<?php
require "src/models/learning.php";

// Récuper les discussions closes
$questions = getQuestions("closed");

require "src/views/learning/closedChats.php";