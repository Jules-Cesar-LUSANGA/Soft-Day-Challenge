<?php

require "src/models/forums.php";

$question = viewQuestion($_GET['viewQuestion']);

// Pour gérer les rédirections et éviter les erreurs
$question_id = $_GET['viewQuestion'];
$forum = $_GET['forum'];
$page = $_GET['page'];
$redirect = "index.php?forum=" . $_GET['forum'] . "&viewQuestion=" . $question_id . "&page=" . $_GET['page'];

$comments = getComments($_GET['viewQuestion']);

if(isset($_POST['post_comment'])){
    if (isset($_POST['comment']) and !empty($_POST['comment'])) {
        
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $question_id = $_GET['viewQuestion'];
        
        postComment($username, $question_id, $comment);
        header("Location:".$redirect);
    }
}

// Vérifications des LIKES & DISLIKES
if(isLikedQuestion($_GET['viewQuestion'])==true){
    $like_btn = "<button type='submit' name='dislike' class='btn btn-danger'>Je n'aime pas</button> ";
}else {
    $like_btn = "<button  type='submit' name='like' class='btn btn-primary'>J'aime</button> ";
}
// Fin vérifications

// LIKE & DISLIKE
if (isset($_POST['like'])) {
    like_question($_GET['viewQuestion']);
    header("Location:" . $redirect);
}elseif (isset($_POST['dislike'])) {
    dislike_question($_GET['viewQuestion']);
    header("Location:" . $redirect);
}
// Fin

// Vérifications si l'auteur de la question c'est l'utilisateur courant
if($question['author']==$_SESSION['username']){
    $delete_btn = " <button  type='submit' name='delete' class='btn btn-danger'>Supprimer</button> ";
    $modify_btn = " <a href='index.php?forum=" . $forum . "&page=" . $page . "&modifyQuestion=" . $_GET['viewQuestion'] . "' class='btn btn-info'>Modifier</a> ";
}

// Suppression d'une question
if (isset($_POST['delete'])) {
    // Est-ce que l'utilisateur courant est auteur de la question ?
    if(isMyQuestion($_GET['viewQuestion'])==true){
        delete_question($_GET['viewQuestion']);
        header("Location:index.php?forums=index");
        exit();
    }
}

require "src/views/forums/actions/viewQuestion.php";