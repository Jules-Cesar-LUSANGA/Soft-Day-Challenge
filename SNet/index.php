<?php
session_start();

/*
Toutes les URL sont traitées dans ce fichier, pour ces raisons :
    - Toujours se référer au dossier parent lors :
        - de l'importation des fichiers et 
        - des rédirections.
J'ai un peu simuler l'architecture mvc
*/

// Rédiriger l'utilisateur s'il accède à une page sans être connecté
if ((!isset($_SESSION['username']) AND !isset($_GET['signup']) AND !isset($_GET['login'])) OR isset($_GET['login'])) {
    require "src/controllers/auth/login.php";
}

// Authentification
elseif (isset($_GET['signup'])) {
    require "src/controllers/auth/signup.php";
}

elseif (isset($_GET['logout'])) {
    require "src/controllers/auth/logout.php";
}

elseif (isset($_GET['home'])) {
    require "src/views/home.php";
}

elseif (isset($_GET['chats'])) {
    require "src/controllers/chats/index.php";
}

elseif (isset($_GET['users_list'])) {
    require "src/controllers/chats/users_list.php";
}

elseif (isset($_GET['chat-to']) and !empty($_GET['chat-to'])) {
    require "src/controllers/chats/private_chat.php";
}

elseif (isset($_GET['deleteMsg']) and !empty($_GET['deleteMsg'])) {
    require "src/controllers/chats/deleteMsg.php";
}

elseif (isset($_GET['profile-for']) and !empty($_GET['profile-for'])) {
    require "src/controllers/profile/profile.php";
}

// Forums views and controllers

elseif (isset($_GET['forums']) and $_GET['forums']=="index") {
    require "src/views/forums/forums.php";
}

elseif (isset($_GET['forums']) and isset($_GET['design'])) {
    require "src/controllers/forums/design.php";
}

elseif (isset($_GET['forums']) and isset($_GET['code'])) {
    require "src/controllers/forums/code.php";
}

elseif (isset($_GET['forums']) and isset($_GET['network'])) {
    require "src/controllers/forums/network.php";
}

elseif (isset($_GET['forums']) and isset($_GET['others'])) {
    require "src/controllers/forums/others.php";
}

elseif (isset($_GET['postQuestion']) and !empty($_GET['postQuestion'])) {
    require "src/controllers/forums/actions/postQuestion.php";
}

elseif (isset($_GET['myQuestions']) and !empty($_GET['myQuestions'])) {
    require "src/controllers/forums/actions/myQuestions.php";
}

elseif (isset($_GET['viewQuestion']) and !empty($_GET['viewQuestion'])) {
    require "src/controllers/forums/actions/viewQuestion.php";
}

elseif (isset($_GET['answer']) and !empty($_GET['answer'])) {
    require "src/controllers/forums/actions/answer.php";
}
// End Forums controllers et views

// Blog views and Controllers
elseif (isset($_GET['blog']) and $_GET['blog']=="index") {
    require "src/controllers/blog/blog_home.php";
}

elseif (isset($_GET['publishArticle'])) {
    require "src/controllers/blog/publishArticle.php";
}

elseif (isset($_GET['myArticles'])) {
    require "src/controllers/blog/myArticles.php";
}

elseif (isset($_GET['viewArticle'])) {
    require "src/controllers/blog/viewArticle.php";
}

elseif (isset($_GET['modifyArticle']) and !empty($_GET['modifyArticle'])) {
    require "src/controllers/blog/modifyArticle.php";
}

elseif (isset($_GET['modifyQuestion']) and !empty($_GET['modifyQuestion'])) {
    require "src/controllers/forums/actions/modifyQuestion.php";
}
// End Blog views and controllers
elseif (isset($_GET['friends']) and $_GET['friends']=="index") {
    require "src/controllers/friends/friends.php";
}

elseif (isset($_GET['usersList'])) {
    require "src/controllers/friends/usersList.php";
}

elseif (isset($_GET['add_friend'])) {
    require "src/controllers/friends/add_friend.php";
}

elseif (isset($_GET['friendRequests'])) {
    require "src/controllers/friends/friendRequests.php";
}

elseif (isset($_GET['confirmRequest']) and !empty($_GET['confirmRequest'])) {
    require "src/controllers/friends/confirmRequest.php";
}

elseif (isset($_GET['refuseRequest']) and !empty($_GET['refuseRequest'])) {
    require "src/controllers/friends/refuseRequest.php";
}

elseif (isset($_GET['myFriends'])) {
    require "src/controllers/friends/myFriends.php";
}

elseif (isset($_GET['modifyProfile'])) {
    require "src/controllers/profile/modifyProfile.php";
}

else {
    require "src/controllers/auth/login.php";
}