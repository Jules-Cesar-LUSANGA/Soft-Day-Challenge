<?php 

require "src/models/blog.php";

// Récupération de tous les utilisateurs du blog
$articles = getArticles("all");

require "src/views/blog/allArticles.php";