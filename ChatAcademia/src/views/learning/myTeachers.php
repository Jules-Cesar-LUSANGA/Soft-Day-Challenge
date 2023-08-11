<?php
$title = "Apprentissage - Mes enseignants";


?>
<div class="container ">
    <div class="mt-4 pt-4">
        <h2>Enseignants sur la plateforme</h2>
        <hr>

            <?php foreach($teachers as $teacher):?>
                <div class="alert alert-success">
                    <p>
                    <?= $teacher['name'] . " (" . $teacher['username'] . ")" ?>
                    </p>
                    <a href="index.php?questionTo=<?= $teacher['username'] ?>&name=<?= $teacher['name'] ?>">Poser une question</a>   
                    |
                    <a href="index.php?profile-for=<?= $teacher['username'] ?>">Discuter en privée</a>                
                </div>
            <?php endforeach ?>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>