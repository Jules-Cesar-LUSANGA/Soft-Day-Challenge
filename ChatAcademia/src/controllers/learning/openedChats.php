<?php
require "src/models/learning.php";

// Récupérer les discussions en cours
$questions = getQuestions("opened");

require "src/views/learning/openedChats.php";