<?php
require "src/models/forums.php";

$questions = getQuestions("Design");

require "src/views/forums/design.php";