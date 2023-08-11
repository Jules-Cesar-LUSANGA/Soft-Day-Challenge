<?php
require "src/models/blog.php";

// AFFICHAGE DE L'ARTICLE DEMANDE

// Récupérer l'article et ses commentaires
$article = viewArticle($_GET['viewArticle']);
$comments = getArticleComments($_GET['viewArticle']);
$article_id = $_GET['viewArticle'];

// Si le bouton POSTER est cliqué
if(isset($_POST['post_comment'])){
    if (isset($_POST['comment']) and !empty($_POST['comment'])) {
        
        // Récupération des variables et exécution de la fonction pour enregistrer le commentaire
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];       
        
        postArticleComment($username, $article_id, $comment);
        
        header("Location:index.php?viewArticle=" . $article_id);
    }else {
        echo "Veuillez saisir quelque chose";
    }
}

// Vérifier si l'utilisateur a liké ou nom l'article courant
if(isLikedArticle($_GET['viewArticle'], $_SESSION['username'])==true){
    $like_btn = "<button type='submit' name='dislike' class='btn btn-danger'>Je n'aime pas</button> ";
}else {
    $like_btn = "<button  type='submit' name='like' class='btn btn-primary'>J'aime</button> ";
}
// Fin vérifications

// Si l'utilisateur clique sur le bouton like ou non
if (isset($_POST['like'])) {
    like_article($_GET['viewArticle']);
    header("Location:index.php?viewArticle=".$_GET['viewArticle']);
}elseif (isset($_POST['dislike'])) {
    dislike_article($_GET['viewArticle']);
    header("Location:index.php?viewArticle=".$_GET['viewArticle']);
}
// Fin

// Vérifier l'utilisateur est l'auteur de cet article
if($article['author']==$_SESSION['username'] OR $_SESSION['username']=="admin"){

    // Afficher les boutons de SUPPRESION et de MODIFICATION
    $delete_btn = " <button  type='submit' name='delete' class='btn btn-danger'>Supprimer</button> ";
    $modify_btn = " <button  type='submit' name='modify' class='btn btn-info'>Modifier</button> ";
}

// Supprimer l'article
if (isset($_POST['delete'])) {
    delete_article($_GET['viewArticle']);
    header("Location:index.php?blog=index");
}
// Modifier l'article
if (isset($_POST['modify'])) {
    header("Location:index.php?modifyArticle=" . $_GET['viewArticle']);
}

require "src/views/blog/viewArticle.php";