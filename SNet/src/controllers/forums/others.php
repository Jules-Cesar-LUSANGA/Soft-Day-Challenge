<?php
require "src/models/forums.php";

$questions = getQuestions("Divers");

require "src/views/forums/others.php";