<?php
require "src/models/blog.php";

$articles = getMyArticles();

require "src/views/blog/myArticles.php";