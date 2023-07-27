<?php
$title = "Modification de l'article";

ob_start();

require "src/views/includes/header.php";
?>

<main>
    <form action="" method="post" class="container">
        <h3>Modification de l'article</h3>
        <div class="form-group">
          <label for="article_title">Titre de l'article</label>
          <input type="text" class="form-control" name="article_title" value="<?= $article['title']; ?>">
        </div>
        <div class="form-group">
          <label for="content">Contenu de l'article</label>
          <textarea class="form-control" name="content" id="content" rows="3"><?= $article['content']; ?></textarea>
        </div>
        <br>
        <div>
            <button type="submit" name="modify" class="btn btn-primary">Modifier</button>
            <a href="index.php?viewArticle=<?= $_GET['modifyArticle']; ?>" class="btn border btn-default">Retour</a>
        </div>
    </form>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>