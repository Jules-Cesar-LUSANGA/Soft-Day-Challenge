<?php
require "src/models/forums.php";

$questions = getQuestions("Réseaux");

require "src/views/forums/network.php";