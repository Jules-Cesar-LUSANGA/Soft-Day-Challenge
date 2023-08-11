<?php

require 'src/models/blog.php';


deleteArticle($_GET['deleteArticle']);

header("Location:index.php?dashboard");