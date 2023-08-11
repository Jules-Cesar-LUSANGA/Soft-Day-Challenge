<?php

function getQuestions($category, $nb=false){
    require "src/models/pdo.php";
    
    $nb=$nb * 5;
	// Requête pour la récupération de tous les posts
	if ($category=="all") {
        $sql = $bdd->query("SELECT * FROM forums_posts ORDER BY id DESC LIMIT $nb,5");
        $pagination = $bdd->query("SELECT * FROM forums_posts");
    }else{
        $sql = $bdd->prepare("SELECT * FROM forums_posts WHERE category=?  ORDER BY id DESC LIMIT $nb,5");
        $pagination = $bdd->prepare("SELECT * FROM forums_posts WHERE category=?");
        $sql->execute(array($category));
        $pagination->execute(array($category));
    }

    $getLikes = $bdd->prepare("SELECT id FROM forums_likes WHERE question_id=?");
    $getComments = $bdd->prepare("SELECT id FROM forums_comments WHERE post_id=?");

    $nb_elements_par_page = 5;
    $nb_elements_dans_la_table = $pagination->rowCount();
    $nb_pages = $nb_elements_dans_la_table / $nb_elements_par_page;
    
    $questions = [];

	while ($res = $sql->fetch()) { 

        $getComments->execute(array($res['id']));
        $getLikes->execute(array($res['id']));

        $likes = $getLikes->rowCount();
        $comments_nb = $getComments->rowCount();
        
        $questions[] = [
            'title' => $res['title'],
            'author' => $res['author'],
            'date' => $res['date'],
            'likes' => $likes,
            'comments_nb' => $comments_nb,
            'content' => $res['content'],
            'id' => $res['id'],
            
        ];
    }
    return [$questions,$nb_pages];
}

function setPosted($username, $title, $category, $content){
    
    require "src/models/pdo.php";

    $postDate = Date("Y/m/d H:i:s");
    
    $sql = $bdd->prepare("INSERT INTO forums_posts(author,title,category,content, date) VALUES(?,?,?,?,?)");
    $sql->execute(array($username,$title, $category, $content, $postDate));
    
}

function getMyQuestions($username){
    require "src/models/pdo.php";

	// Requête pour la récupération de tous les posts
	$sql = $bdd->prepare("SELECT * FROM forums_posts WHERE author=? ORDER BY id DESC");
	$sql->execute(array($username));
	
    $getLikes = $bdd->prepare("SELECT id FROM forums_likes WHERE question_id=?");
    $getComments = $bdd->prepare("SELECT id FROM forums_comments WHERE post_id=?");
    
    $myQuestions = [];

	while ($res = $sql->fetch()) { 

        $getComments->execute(array($res['id']));
        $getLikes->execute(array($res['id']));

        $likes = $getLikes->rowCount();
        $comments_nb = $getComments->rowCount();
        
        $myQuestions[] = [
            'title' => $res['title'],
            'author' => $res['author'],
            'date' => $res['date'],
            'likes' => $likes,
            'comments_nb' => $comments_nb,
            'content' => $res['content'],
            'id' => $res['id'],
            
        ];
    }
    return $myQuestions;
}

function viewQuestion($id){
    require "src/models/pdo.php";

	// Requête pour la récupération de tous les posts
	$sql = $bdd->prepare("SELECT * FROM forums_posts WHERE id=?");
	$sql->execute(array($id));

    $getLikes = $bdd->prepare("SELECT id FROM forums_likes WHERE question_id=?");
	$getLikes->execute(array($id));

    $getComments = $bdd->prepare("SELECT id FROM forums_comments WHERE post_id=?");
	$getComments->execute(array($id));

    // Récupérer le nombre des likes et commentaires
    $likes = $getLikes->rowCount();
    $comments_nb = $getComments->rowCount();

    $res = $sql->fetch(); 
    $question= [
        'title' => $res['title'],
        'author' => $res['author'],
        'date' => $res['date'],
        'likes' => $likes,
        'comments_nb' => $comments_nb,
        'content' => $res['content'],  
    ];
    return $question;
}

function postComment($username, $post_id, $comment){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("INSERT INTO forums_comments(username,post_id,comment,date) VALUES(?,?,?,?)");

    $comment_date = Date("Y/m/d H:i:s");

    $sql->execute(array($username, $post_id, $comment, $comment_date));
}

function getComments($post_id){
    require "src/models/pdo.php";

	// Requête pour la récupération de tous les posts
	$sql = $bdd->prepare("SELECT * FROM forums_comments WHERE post_id=? ORDER BY id DESC");
	$sql->execute(array($post_id));

    $comments = [];
	while ($res = $sql->fetch()) { 
        $comments[] = [
            'author' => $res['username'],
            'date' => $res['date'],
            'comment' => $res['comment'],     
            'id' => $res['id'],     
        ];
    }
    return $comments;
}

function getComment($comment_id){
    require "src/models/pdo.php";

	// Requête pour la récupération de tous les posts
	$sql = $bdd->prepare("SELECT * FROM forums_comments WHERE id=?");
	$sql->execute(array($comment_id));
    $res = $sql->fetch(); 
    // $comment = [];
	
    $comment = [
        'username' => $res['username'],
        'date' => $res['date'],
        'comment' => $res['comment'],     
        'id' => $res['id'],     
    ];
    return $comment;
}

function getAnswers($comment_id){
    require "src/models/pdo.php";

	// Requête pour la récupération de toutess les réponses au commentaire courrant
	$sql = $bdd->prepare("SELECT * FROM forums_answers WHERE comment_id=? ORDER BY id DESC");
	$sql->execute(array($comment_id));

    // Stockage des données récupérées de la base
    $answers = [];
	while ($res = $sql->fetch()) { 
        $answers[] = [
            'date' => $res['date'],
            'author' => $res['username'],
            'answer' => $res['answer'],
            'id' => $res['id'],
        ];
    }
    return $answers;
}

function postAnswer($username, $question_id, $comment_id, $answer){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("INSERT INTO forums_answers(username,question_id,comment_id,answer,date) VALUES(?,?,?,?,?)");

    $comment_date = Date("Y/m/d H:i:s");

    $sql->execute(array($username, $question_id, $comment_id, $answer, $comment_date));
}

function isLikedQuestion($question_id){
    require "src/models/pdo.php";

    $username = $_SESSION['username'];
    $sql = $bdd->prepare("SELECT question_id,username FROM forums_likes WHERE question_id = ? AND username=?");
    $sql->execute(array($question_id, $username));
    
    // Vérifier si la question est déjà aimée par l'utilisateur ou non
    if ($sql->rowCount()==0 ) {
        return false;
    }else {
        return true;
    }
}

function like_question($question_id){
    require "src/models/pdo.php";

    $username = $_SESSION['username'];
    
    if (isLikedQuestion($question_id)==false) {
    
        $sql = $bdd->prepare("INSERT INTO forums_likes(question_id,username) VALUES(?,?)");
        $sql->execute(array($question_id,$username));  

    }
}

function dislike_question($question_id){
    require "src/models/pdo.php";

    $username = $_SESSION['username'];
    
    if (isLikedQuestion($question_id, $username)==true) {

        $sql = $bdd->prepare("DELETE FROM forums_likes WHERE question_id=? AND username=?");
        $sql->execute(array($question_id,$username));  

    }
}

function delete_question($question_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("DELETE FROM forums_posts WHERE id=?");
    $sql->execute(array($question_id));
    
    $sql = $bdd->prepare("DELETE FROM forums_likes WHERE question_id=?");
    $sql->execute(array($question_id));
    
    $sql = $bdd->prepare("DELETE FROM forums_answers WHERE question_id=?");
    $sql->execute(array($question_id));
    
    $sql = $bdd->prepare("DELETE FROM forums_comments WHERE post_id=?");
    $sql->execute(array($question_id));  

}

function modify_question($title, $content, $question_id){
    require "src/models/pdo.php";

    // Modification et utilisation de la fonction nl2br pour prendre en charge le retour à la ligne
    $sql = $bdd->prepare("UPDATE forums_posts SET title=?, content=? WHERE id=?");
    $sql->execute(array($title, nl2br($content), $question_id));

}

// Vérifier si l'utilisateur est l'auteur de la question avant toute opération
function isMyQuestion($question_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT author FROM forums_posts WHERE id = ?");
    $sql->execute(array($question_id));

    $res = $sql->fetch();
    $username = $res['author'];

    if ($username == $_SESSION['username']) {
        return true;
    }else{
        return false;
    }
}