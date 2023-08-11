<?php
require "src/models/learning.php";

$comment_id = $_GET['viewAnswerToComment'];
$question_id = $_GET['question_id'];
// Récupération des questions et réponses
$comment = getQuestionComment($comment_id);
$answers = getAnswers($comment_id);

if(isset($_POST['post_answer'])){
    if(!empty($_POST['answer'])){
        postAnswer($comment_id, $_POST['answer']);
        header("Location:index.php?viewAnswerToComment=$comment_id&question_id=$question_id");
    }else{
        echo "Tapez quelque chose";
    }
}
require "src/views/learning/viewAnswerToComment.php";