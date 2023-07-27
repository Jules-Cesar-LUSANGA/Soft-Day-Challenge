<?php
require "src/models/blog.php";

$question = viewArticle($_GET['viewArticle']);

$comments = getArticleComments($_GET['viewArticle']);

if(isset($_POST['post_comment'])){
    if (isset($_POST['comment']) and !empty($_POST['comment'])) {
        
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $article_id = $_GET['viewArticle'];
        
        postArticleComment($username, $article_id, $comment);
        
        header("Location:index.php?viewArticle=" . $article_id);
    }else {
        echo "Veuillez saisir quelque chose";
    }
}

// Vérifications des LIKES & DISLIKES
if(isLikedArticle($_GET['viewArticle'], $_SESSION['username'])==true){
    $like_btn = "<button type='submit' name='dislike' class='btn btn-danger'>Je n'aime pas</button> ";
}else {
    $like_btn = "<button  type='submit' name='like' class='btn btn-primary'>J'aime</button> ";
}
// Fin vérifications

// LIKE & DISLIKE
if (isset($_POST['like'])) {
    like_article($_GET['viewArticle']);
    header("Location:index.php?viewArticle=".$_GET['viewArticle']);
}elseif (isset($_POST['dislike'])) {
    dislike_article($_GET['viewArticle']);
    header("Location:index.php?viewArticle=".$_GET['viewArticle']);
}
// Fin

// Vérifications si l'auteur de l'article c'est l'utilisateur courant
if($question['author']==$_SESSION['username']){
    $delete_btn = " <button  type='submit' name='delete' class='btn btn-danger'>Supprimer</button> ";
    $modify_btn = " <button  type='submit' name='modify' class='btn btn-info'>Modifier</button> ";
}

// Suppression de l'article
if (isset($_POST['delete'])) {
    delete_article($_GET['viewArticle']);
    header("Location:index.php?blog=index");
}
// Modifier l'article
if (isset($_POST['modify'])) {
    header("Location:index.php?modifyArticle=" . $_GET['viewArticle']);
}

require "src/views/blog/viewArticle.php";