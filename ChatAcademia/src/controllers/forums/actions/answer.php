<?php
require "src/models/forums.php";

// Récupération du commentaire et ses réponses
$comment = getComment($_GET['answer']);
$answers = getAnswers($_GET['answer']);
$question_id = $_GET['question_id'];
// Pour gérer les redirections
$forum = $_GET['forum'];
$page = $_GET['page'];

// Si le bouton POSTER est cliqué
if(isset($_POST['post_answer'])){
    if (isset($_POST['answer']) and !empty($_POST['answer'])) {      
        $username = $_SESSION['username'];
        $answer = htmlspecialchars($_POST['answer']);
        $comment_id = htmlspecialchars($_GET['answer']);
        
        postAnswer($username, $question_id, $comment_id, $answer);
        header("Location:index.php?answer=$comment_id&forum=$forum&page=$page&question_id=$question_id");
    }
}

require "src/views/forums/actions/answer.php";