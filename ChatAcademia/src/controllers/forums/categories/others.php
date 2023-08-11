<?php
require "src/models/forums.php";

if(isset($_GET['page'])){
    $questions = getQuestions("Divers", $_GET['page']);
}else{
    $questions = getQuestions("Divers");
} 

require "src/views/forums/categories/others.php";