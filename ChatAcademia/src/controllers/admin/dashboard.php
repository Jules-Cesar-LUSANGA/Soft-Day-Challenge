<?php 
require 'src/models/blog.php';
require 'src/controllers/blog/publishArticle.php';

require 'src/controllers/admin/users/usersList.php';
require 'src/controllers/admin/addTeacher.php';

$getAllArticles = getArticles("all");


require 'src/views/admin/dashboard.php';