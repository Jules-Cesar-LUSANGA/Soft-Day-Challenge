<?php
require "src/models/forums.php";

// Si la variable page est définie, afin de faire la pagination
if(isset($_GET['page'])){
    // Passer la variable à la fonction
    $questions = getQuestions("Programmation", $_GET['page']);
}else{
    // Ou pas
    $questions = getQuestions("Programmation");
}    

require "src/views/forums/categories/code.php";