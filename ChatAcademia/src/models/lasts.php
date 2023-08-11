<?php
require "src/models/pdo.php";

// Récupération du dernier article
$getLastArticle = $bdd->query("SELECT * FROM blog_articles ORDER BY id DESC LIMIT 0,1");
$article = $getLastArticle->fetch();

// Récupération de la dernière discussion
$getLastChat = $bdd->query("SELECT * FROM chats_with_teachers ORDER BY id DESC LIMIT 0,1");
$chat = $getLastChat->fetch();

// Récupération de la dernière question du forum
$getLastQuestion = $bdd->query("SELECT * FROM forums_posts ORDER BY id DESC LIMIT 0,1");
$question = $getLastQuestion->fetch();