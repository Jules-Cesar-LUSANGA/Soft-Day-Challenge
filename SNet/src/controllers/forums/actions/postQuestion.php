<?php
require "src/models/forums.php";

if ($_GET['postQuestion']=="design") {
    $subject = "Design";
}elseif ($_GET['postQuestion']=="code") {
    $subject = "Programmation";
}elseif ($_GET['postQuestion']=="network") {
    $subject = "Réseaux";
}else {
    $subject = "Divers";
}

if (isset($_POST['post'])) {

    if (!empty($_POST['content']) and !empty($_POST['title'])) {
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        setPosted($_SESSION['username'], $title, $content, $subject);
        header("Location:index.php?forums&". $_GET['postQuestion']);
    } else {
        echo "Veuillez remplir tous les champs !";
    }
}

require "src/views/forums/actions/postQuestion.php";