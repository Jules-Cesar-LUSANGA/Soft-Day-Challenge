<?php
require "src/models/learning.php";

// Si le bouton en enclenché
if(isset($_POST['askQuestion'])){
    
    // Vérifier si le champ de la question n'est pas vie
    if(!empty($_POST['question_content'])) {
        // Envoyer la question
        askQuestion($_POST['question_content']);
        header("Location:index.php?learning=openedChats");
    }else{
        echo "Taper quelque chose !";
    }
    
}
require "src/views/learning/questionTo.php";