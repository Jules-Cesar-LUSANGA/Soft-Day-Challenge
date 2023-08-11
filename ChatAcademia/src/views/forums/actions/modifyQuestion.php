<?php
$title = "Modification de la question";

ob_start();

?>

<div class="container ">
    <form action="" method="post" class="mt-4 pt-4">
        <h3><?= $title ?></h3>
        <div class="form-group">
            <label class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" name="title" value="<?= $question['title'];?>">
        </div>
        <div class="form-group">
          <label for="content">Contenu de l'article</label>
          <textarea class="form-control" name="content" id="content" rows="3"><?= $question['content']; ?></textarea>
        </div>
        <br>
        <div>
            <button type="submit" name="modify" class="btn btn-primary">Modifier</button>
            <a href="<?= $redirect ?>" class="btn border btn-default">Retour</a>
        </div>
    </form>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>