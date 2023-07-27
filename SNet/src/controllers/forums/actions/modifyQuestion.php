<?php
require "src/models/forums.php";

$question_id = $_GET['modifyQuestion'];
$question = viewQuestion($question_id);

if (isset($_POST['modify'])) {
    modify_question($_POST['content'], $_GET['modifyQuestion']);
    header("Location:index.php?forums=index");
}

if(isMyQuestion($question_id)==true){
    require "src/views/forums/actions/modifyQuestion.php";
}else{
    header("Location:index.php?viewQuestion=" . $question_id);
}