<?php
$title = "Publier un article sur le blog";

ob_start();
?>

<div class="container">
  <div class="mt-4 pt-4">

    <h3>Publier un article</h3>
    <form method="post">
      <div class="form-body">
          <div class="form-group pt-2">
            <label for="category">Catégorie</label>
            <select class="form-control" name="category" id="category">
              <option>Technologie</option>
              <option>Sciences</option>
              <option>Développement personnel</option>
              <option>Conseils</option>
              <option>Autres</option>
            </select>
          </div>
          <div class="form-group pt-2">
            <label for="article_title">Titre</label>
            <input type="text" class="form-control" name="article_title" id="article_title" aria-describedby="helpId" placeholder="Ecrivez quelque chose !">
          </div>
          
          <div class="form-group pt-2">
            <label for="content">Contenu</label>
            <textarea class="form-control wysiwyg" id="wysiwyg" name="content" cols="3" rows="3"></textarea>
          </div>
      </div>

      <div class="form-footer mt-2">
        <button type="submit" name="publishArticle" class="btn btn-primary">Publier l'article</button>
      </div>
    </form>
  </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>