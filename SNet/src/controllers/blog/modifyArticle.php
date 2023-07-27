<?php
require "src/models/blog.php";

$article = viewArticle($_GET['modifyArticle']);

if (isset($_POST['modify'])) {
    modify_article($_POST['article_title'], $_POST['content'], $_GET['modifyArticle']);
    header("Location:index.php?blog=index");
}
require "src/views/blog/modifyArticle.php";