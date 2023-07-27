<?php
$title = "Publier un article";

ob_start();

require "src/views/includes/header.php";
?>

<main class="container">
    <p>
        <a href="index.php?blog=index">Articles</a>
        <a href="index.php?myArticles">Mes articles</a>
    </p>
    <form action="" method="post">
        <div class="form-group">
          <label for="category">Catégorie</label>
          <select class="form-control" name="category" id="category">
            <option>Technologie</option>
            <option>Sciences</option>
            <option>Développement personnel</option>
            <option>Conseils</option>
            <option>Autres</option>
          </select>
        </div>
        <div class="form-group">
          <label for="article_title">Titre</label>
          <input type="text" class="form-control" name="article_title" id="article_title" aria-describedby="helpId" placeholder="Ecrivez quelque chose !">
        </div>
        <div class="form-group">
          <label for="content">Contenu</label>
          <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>
        <button type="submit" name="publishArticle" class="btn btn-primary">Publier l'article</button>
    
      </form>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>