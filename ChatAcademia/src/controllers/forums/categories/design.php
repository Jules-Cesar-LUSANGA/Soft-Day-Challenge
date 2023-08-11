<?php
require "src/models/forums.php";

if(isset($_GET['page'])){
    $questions = getQuestions("Design", $_GET['page']);
}else{
    $questions = getQuestions("Design");
} 

require "src/views/forums/categories/design.php";