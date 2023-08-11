<?php
require "src/models/blog.php";

// Vérifier si l'utilisateur veut une certaine catégorie ou pas
// et chercher touts les articles correspondants
if (isset($_POST['category']) and $_POST['category'] != "Tous") {
    $articles = getArticles($_POST['category']);
}else {
    $articles = getArticles("all");
}

require "src/views/blog/blog_home.php";