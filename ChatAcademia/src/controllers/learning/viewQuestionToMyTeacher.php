<?php
require "src/models/learning.php";

$question_id = $_GET['viewQuestionToMyTeacher'];

$question = getQuestion($question_id);
$comments = getQuestionComments($question_id);
$comments_nbr = getQuestionsCommentsNbr($question_id);

if(isset($_POST['post_comment'])){
    if (!empty($_POST['comment'])) {
        postComment($_POST['comment'], $question_id);
        header("Location:index.php?viewQuestionToMyTeacher=$question_id");
    }
}elseif(isset($_POST['close'])){
    // Clore la discussion
    closeChat($question_id);
}

require "src/views/learning/viewQuestionToMyTeacher.php";