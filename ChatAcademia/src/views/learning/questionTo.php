<?php
$title = "Apprentissage - Poser une question";


?>
<div class="container">
    <div class="mt-4 pt-4">
        <h3>Poser une question à l'enseignant(e) <?= $_GET['name'] ?> </h3>
        <form action="" method="post">
            <div class="form-group">
                <label for="question_content">Question</label>
                <textarea class="form-control" name="question_content" id="question_content"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="askQuestion" class="btn btn-outline-info mt-2">Envoyer</button>
            </div>
            
        </form>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>