<?php
require "src/models/forums.php";

if(isset($_GET['page'])){
    $questions = getQuestions('all', $_GET['page']);
}else{
    $questions = getQuestions('all');
}

require "src/views/forums/forums.php";
