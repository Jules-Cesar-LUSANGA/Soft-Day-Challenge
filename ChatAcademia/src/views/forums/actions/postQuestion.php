<?php
$title = "Poster une question";

ob_start();
?>
<div class="container">
  <form action="" method="post" class="mt-4 pt-4">
      <h3>Poster une question sur un forum</h3>
      <hr>
      <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group mt-2">
        <label for="category">Forum</label>
        <select name="category" class="form-control" id="category">
            <option>Design</option>
            <option>Programmation</option>
            <option>Réseaux</option>
            <option>Divers</option>
        </select>
      </div>
      
      <div class="form-group mt-2">
        <label for="content">Contenu</label>
        <textarea class="form-control" name="content" id="article" rows="3"></textarea>
      </div>
      <button type="submit" name="post" class="btn btn-primary mt-2">Poster la question</button>
  </form>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>

