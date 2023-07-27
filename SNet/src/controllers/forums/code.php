<?php
require "src/models/forums.php";

$questions = getQuestions("Programmation");

require "src/views/forums/code.php";