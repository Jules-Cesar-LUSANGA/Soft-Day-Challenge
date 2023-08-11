<?php
require "src/models/blog.php";

// MODIFICATION D'UN ARTICLE DU BLOG

// Récupération des informations l'article à afficher 
// grâce à la variable passée à l'url

$article = viewArticle($_GET['modifyArticle']);

// Vérifier si l'utilisateur a cliqué sur le bouton de modification
if (isset($_POST['modify'])) {
    // Vérifier si tous les champs ont du text
    if(!empty($_POST['article_title']) AND !empty($_POST['content'])){
        // Modification de l'article
        modify_article($_POST['article_title'], $_POST['content'], $_GET['modifyArticle']);
        header("Location:index.php?blog=index");
    }
}

require 'src/views/blog/modifyArticle.php';