<?php
$title = "Accueil";

ob_start();

?>

<div class="container">
    <div class="homeContent mt-4 pt-4">
        <h1>Accueil</h1>
        <hr>
        <article>
            <p>
                Le saviez-vous ?
                <span class="text-primary">Chat</span><span class="text-danger">Academia</span>
                est une plateforme qui réunit l'enseignant et l'étudiant, celui qui connait déjà et celui qui apprend encore, autour d'un seul thème : APPRENDRE !
            </p>
            <blockquote class="blockquote">
                <p class="mb-0"><< On ne cessera jamais d'apprendre ! >></p>
            </blockquote>
        </article>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>