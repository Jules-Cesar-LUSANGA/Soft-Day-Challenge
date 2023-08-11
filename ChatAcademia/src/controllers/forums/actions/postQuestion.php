<?php
require "src/models/forums.php";

if (isset($_POST['post'])) {
    // Vérifier si les champs TITRE et CONTENU ne sont pas vides
    if (!empty($_POST['content']) and !empty($_POST['title'])) {
        
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);

        setPosted($_SESSION['username'], $title, $_POST['category'], $content);
        
        header("Location:index.php?forums=index&page=0");
    } else {
        echo "Veuillez remplir tous les champs !";
    }
}

require "src/views/forums/actions/postQuestion.php";