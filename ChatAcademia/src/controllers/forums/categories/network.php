<?php
require "src/models/forums.php";

if(isset($_GET['page'])){
    $questions = getQuestions("Réseaux", $_GET['page']);
}else{
    $questions = getQuestions("Réseaux");
} 

require "src/views/forums/categories/network.php";