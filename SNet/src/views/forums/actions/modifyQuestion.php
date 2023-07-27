<?php
$title = "Modification de la question";

ob_start();

require "src/views/includes/header.php";
?>

<main>
    <form action="" method="post" class="container">
        <h3><?= $title ?></h3>
        <div class="form-group">
          <label for="content">Contenu de l'article</label>
          <textarea class="form-control" name="content" id="content" rows="3"><?= $question['content']; ?></textarea>
        </div>
        <br>
        <div>
            <button type="submit" name="modify" class="btn btn-primary">Modifier</button>
            <a href="index.php?viewArticle=<?= $_GET['modifyQuestion']; ?>" class="btn border btn-default">Retour</a>
        </div>
    </form>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>