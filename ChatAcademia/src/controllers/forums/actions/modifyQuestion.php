<?php
require "src/models/forums.php";

// Gestion des rédirections
$question_id = $_GET['modifyQuestion'];
$forum = $_GET['forum'];
$page = $_GET['page'];
$redirect = "index.php?forum=" . $_GET['forum'] . "&viewQuestion=" . $question_id . "&page=" . $_GET['page'];

$question = viewQuestion($question_id);

if (isset($_POST['modify'])) {
    modify_question($_POST['title'],$_POST['content'], $_GET['modifyQuestion']);
    header("Location:" . $redirect);
}

// Vérifier si l'utilisateur est l'auteur de la question 
// avant la modification, sinon le rétourner sur la question (AU CAS OU)
if(isMyQuestion($question_id)==true){
    require "src/views/forums/actions/modifyQuestion.php";
}else{
    header("Location:index.php?viewQuestion=" . $question_id);
}