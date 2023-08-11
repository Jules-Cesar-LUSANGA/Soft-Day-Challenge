<?php

// Fonction pour récupérer tous les articles qui se trouvent sur la plateforme
function getArticles($category){

    // Connexion à la base de donnée et récupération des articles
    require "src/models/pdo.php";
    
    if ($category=="all") { 
        $sql = $bdd->query("SELECT * FROM blog_articles ORDER BY id DESC"); 
    }else {
        $sql = $bdd->prepare("SELECT * FROM blog_articles WHERE category=? ORDER BY id DESC");
        $sql->execute(array($category));
    }
    
    // Récupération et Stockage des résultats dans un tableau
    $articles=[];
    while ($res = $sql->fetch()) {

        $articles[] = [
            'id'=>$res['id'],
            'author'=>$res['author'],
            'title'=>$res['article_title'],
            'content'=>$res['content'],
            'date'=>$res['article_date'],
        ];
    }
    return $articles;
}

// Récupération de l'article
function viewArticle($article_id){
    require "src/models/pdo.php";
	// Requête pour la récupération de tous les articles
	$sql = $bdd->prepare("SELECT * FROM blog_articles WHERE id=?");
	$sql->execute(array($article_id));

    $getLikes = $bdd->prepare("SELECT id FROM blog_likes WHERE article_id=?");
	$getLikes->execute(array($article_id));

    $likesNb = $getLikes->rowCount();

    $res = $sql->fetch(); 
    $article= [
        'title' => $res['article_title'],
        'author' => $res['author'],
        'date' => $res['article_date'],
        'likes' => $likesNb,
        'content' => $res['content'],  
    ];
    return $article;
}

function getArticleCommentsNbr($article_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT id FROM blog_comments WHERE article_id=?");
    $sql->execute(array($article_id));

    $nb = $sql->rowCount();
    return $nb;
}

function deleteArticle($article_id){
    require "src/models/pdo.php";
    $sql = $bdd->prepare("DELETE FROM blog_articles WHERE id=?");
    $sql->execute(array($article_id));
}

function isLikedArticle($article_id,$username){

    require "src/models/pdo.php";

    // Récupération des variables
    $article_id = $_GET['viewArticle'];
    $username = $_SESSION['username'];

    $sql = $bdd->prepare("SELECT article_id,username FROM blog_likes WHERE article_id = ? AND username=?");
    $sql->execute(array($article_id, $username));
    
    // Vérifier si l'article est déjà aimé par l'utilisateur ou non
    if ($sql->rowCount()==0 ) {
        return false;
    }else {
        return true;
    }
}
// Aimer article
function like_article($article_id){
    // Connexion à la base de données
    require "src/models/pdo.php";    
    
    $username = $_SESSION['username'];
    
    if (isLikedArticle($article_id, $username)==false) {
    
        $sql = $bdd->prepare("INSERT INTO blog_likes(article_id,username) VALUES(?,?)");
        $sql->execute(array($article_id,$username));  

    }
}

function dislike_article($article_id){
    require "src/models/pdo.php";
    
    $username = $_SESSION['username'];
    
    if (isLikedArticle($article_id, $username)==true) {

        $sql = $bdd->prepare("DELETE FROM blog_likes WHERE article_id=? AND username=?");
        $sql->execute(array($article_id,$username));  

    }
}

function modify_article($article_title, $content, $article_id){
    require "src/models/pdo.php";    

    // Modification et utilisation de la fonction nl2br pour prendre en charge le retour à la ligne
    $sql = $bdd->prepare("UPDATE blog_articles SET article_title=?,content=? WHERE id=?");
    $sql->execute(array($article_title, nl2br($content), $article_id));

}

function delete_article($article_id){
    
    require "src/models/pdo.php";    
    
    $sql = $bdd->prepare("DELETE FROM blog_articles WHERE id=?");
    $sql->execute(array($article_id));  
    $sql = $bdd->prepare("DELETE FROM blog_likes WHERE article_id=?");
    $sql->execute(array($article_id)); 
    $sql = $bdd->prepare("DELETE FROM blog_comments WHERE article_id=?");
    $sql->execute(array($article_id)); 

}

function publishArticle($username, $title, $category, $content){

    // Connexion à la base de données et préparation de la reqûete
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("INSERT INTO blog_articles(author,article_title,category, content,article_date) VALUES(?,?,?,?,now())");
    // Exécution de la requête
    $sql->execute(array($username, $title, $category, $content));
}

// Récupération des articles de l'utilisateur courrant
function getMyArticles(){
    
    require "src/models/pdo.php";

	// Requête pour la récupération de tous les articles de l'utilisateur courrant
	$sql = $bdd->prepare("SELECT * FROM blog_articles WHERE author=? ORDER BY id DESC");
	$sql->execute(array($_SESSION['username']));

    $myArticles = [];

	while ($res = $sql->fetch()) { 
        $myArticles[] = [
            'id'=>$res['id'],
            'title'=>$res['article_title'],
            'content'=>$res['content'],
            'date'=>$res['article_date'],    
        ];
    }
    return $myArticles;
}


// Récupération des commentaires pour l'article courant
function getArticleComments($article_id){
    require "src/models/pdo.php";

	// Requête pour la récupération de tous les posts
	$sql = $bdd->prepare("SELECT * FROM blog_comments WHERE article_id=? ORDER BY id DESC");
	$sql->execute(array($article_id));

    $comments = [];
	while ($res = $sql->fetch()) { 
        $comments[] = [
            'author' => $res['username'],
            'date' => $res['date'],
            'content' => $res['content'],     
            'id' => $res['id'],     
        ];
    }
    return $comments;
}

// Commenter un article
function postArticleComment($username, $article_id, $comment){
    require "src/models/pdo.php";
    
    $sql = $bdd->prepare("INSERT INTO blog_comments(username,article_id,content,date) VALUES(?,?,?,?)");

    $comment_date = Date("Y/m/d H:i:s");

    $sql->execute(array($username, $article_id, $comment, $comment_date));
}