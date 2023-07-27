<?php
require "src/models/blog.php";

if (isset($_POST['publishArticle'])) {
    
    if (!empty($_POST['content']) and !empty($_POST['article_title'])) {
        
        $title = htmlspecialchars($_POST['article_title']);
        $category = htmlspecialchars($_POST['category']);
        $content = htmlspecialchars($_POST['content']);
        
        publishArticle(
            $_SESSION['username'], 
            $title,
            $category, 
            $content
        );

        header("Location:index.php?blog=index");

    } else {
        echo "Veuillez remplir tous les champs !";
    }

}
require "src/views/blog/publishArticle.php";