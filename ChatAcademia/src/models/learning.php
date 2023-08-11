<?php
require "src/models/pdo.php";
function getTeachers(){
    require "src/models/pdo.php";

    $sql = $bdd->query("SELECT * FROM users WHERE category='Enseignant' ORDER BY complete_name");

    $teachers = [];
    // Récupération de tous les professeurs de la plateforme
    while ($res = $sql->fetch()) {
        $teachers[] = [
            'name' => $res['complete_name'],
            'username' => $res['username'],
        ];
    }
    return $teachers;
}

function askQuestion($question_content){
    require "src/models/pdo.php";

    // Préparation de la requête pour l'insertion de la question de l'utilisateur
    $sql = $bdd->prepare("INSERT INTO chats_with_teachers(teacher,teacher_complete_name, question, question_author, question_date, question_status) VALUES(?,?,?,?,?,'opened')");

    // Récupération des variables
    $teacher = $_GET['questionTo'];
    $teacher_complete_name = $_GET['name'];
    $question = $question_content;
    $question_author = $_SESSION['username'];
    $question_date = Date("Y/m/d h:i:s");

    // Exécution de la requête
    $sql->execute(array($teacher,$teacher_complete_name, htmlspecialchars($question), $question_author, $question_date));
}

function getQuestions($status){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM chats_with_teachers WHERE question_status=? ORDER BY id DESC");
    $sql->execute(array($status));

    // Initialisation de la variable question pour éviter de ne retourner rien
    $questions = [];

    // Récupération des questions adressées aux enseignants
    if($sql->rowCount()>0){
        
        while ($res = $sql->fetch()) {
            
            $questions[] = [
                'id' => $res['id'], 
                'to' => $res['teacher_complete_name'], 
                'content' => $res['question'], 
                'by' => $res['question_author'], 
                'date' => $res['question_date'], 
                'question_status' => $res['question_status']
            ];
        }
    }

    return $questions;
}
function getQuestion($question_id){
    
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM chats_with_teachers WHERE id=?");
    $sql->execute(array($question_id));

    $res = $sql->fetch();
        
    $question = [
        'id' => $res['id'], 
        'to' => $res['teacher_complete_name'], 
        'content' => $res['question'], 
        'by' => $res['question_author'], 
        'date' => $res['question_date'], 
        'status' => $res['question_status']
    ];

    return $question;
}
function postComment($comment_content, $question_id){
    require "src/models/pdo.php";

    // Préparation de la requête pour l'insertion de la question de l'utilisateur
    $sql = $bdd->prepare("INSERT INTO chats_with_teachers_comments(question_id, comment_author, comment_content, comment_date) VALUES(?,?,?,?)");

    // Récupération des variables
    $comment_author = $_SESSION['username'];
    $comment_date = Date("Y/m/d h:i:s");
    // Exécution de la requête
    $sql->execute(array($question_id, $comment_author, htmlspecialchars($comment_content), $comment_date));
}

function getQuestionComment($comment_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM chats_with_teachers_comments WHERE id=?");
    $sql->execute(array($comment_id));

    $res = $sql->fetch();
            
            $comment= [
                'id' => $res['id'], 
                'author' => $res['comment_author'], 
                'content' => $res['comment_content'], 
                'date' => $res['comment_date'], 
            ];
    
    return $comment;

}
function getQuestionComments($question_id){
    
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM chats_with_teachers_comments WHERE question_id=? ORDER BY id DESC");
    $sql->execute(array($question_id));

    if($sql->rowCount()>0){
        
        while ($res = $sql->fetch()) {
            
            $comments[] = [
                'id' => $res['id'], 
                'author' => $res['comment_author'], 
                'content' => $res['comment_content'], 
                'date' => $res['comment_date'], 
            ];
        }
        return $comments;
    }
}
function getAnswers($comment_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT * FROM chats_with_teachers_answers WHERE comment_id=? ORDER BY id DESC");

    $sql->execute(array($comment_id));

    if($sql->rowCount()>0){
        
        while ($res = $sql->fetch()) {
            
            $answers[] = [
                'id' => $res['id'], 
                'author' => $res['answer_author'], 
                'content' => $res['answer_content'], 
                'date' => $res['answer_date'], 
            ];
        }
        return $answers;
    }
}
function postAnswer($comment_id, $answer_content){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("INSERT INTO chats_with_teachers_answers(comment_id, answer_author, answer_content, answer_date) VALUES(?,?,?,?)");

    $answer_author = $_SESSION['username'];
    $answer_date = Date("Y/m/d h:i:s");
    // Exécution de la requête
    $sql->execute(array($comment_id, $answer_author, htmlspecialchars($answer_content), $answer_date));
}

function closeChat($question_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("UPDATE chats_with_teachers SET question_status=? WHERE id=?");
    $sql->execute(array("closed",$question_id));
}
function isClosedChat($question_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT question_status FROM chats_with_teachers WHERE id=?");
    $sql->execute(array($question_id));

    $res = $sql->fetch();
        
    if($res['question_status']=="closed"){
        return true;
    }else{
        return false;
    }
}
function getQuestionsCommentsNbr($question_id){
    require "src/models/pdo.php";

    $sql = $bdd->prepare("SELECT id FROM chats_with_teachers_comments WHERE question_id=?");
    $sql->execute(array($question_id));

    return $sql->rowCount();
}