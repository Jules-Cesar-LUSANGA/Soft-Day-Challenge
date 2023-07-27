<?php
require "src/models/forums.php";

$comment = getComment($_GET['answer']);

$answers = getAnswers($_GET['answer']);

if(isset($_POST['post_answer'])){
    if (isset($_POST['answer']) and !empty($_POST['answer'])) {
        
        $username = $_SESSION['username'];
        $answer = $_POST['answer'];
        $comment_id = $_GET['answer'];
        
        postAnswer($username, $comment_id, $answer);
        header("Location:index.php?answer=$comment_id");
    }
}

require "src/views/forums/actions/answer.php";