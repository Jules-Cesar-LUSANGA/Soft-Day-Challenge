<?php
require "src/models/blog.php";

if (isset($_POST['category']) and $_POST['category'] != "Tous") {
    $articles = getArticles($_POST['category']);
}else {
    $articles = getArticles("all");
}

require "src/views/blog/blog_home.php";