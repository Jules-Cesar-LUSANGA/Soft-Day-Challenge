<?php
require "src/models/forums.php";

// Récupérer les questions de l'utilisateur
$questions = getMyQuestions($_SESSION['username']);

require "src/views/forums/actions/myQuestions.php";