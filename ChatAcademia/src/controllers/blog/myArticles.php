<?php
require "src/models/blog.php";

// RECUPERATION DES ARTICLES DE L'UTILISATEUR

$articles = getMyArticles();

require "src/views/blog/myArticles.php";