<?php
$title = "Poster une question";

ob_start();

require "src/views/includes/header.php";
?>

<main>
    
</main>
  <form action="" method="post" class="container bg-info">
      <p>
        Sujet : <?= $subject ?>
      </p>
      <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title"class="form-control">
      </div>

      <div class="form-group">
        <label for="content">Contenu</label>
        <textarea class="form-control" name="content" id="article" rows="3"></textarea>
      </div>
      <button type="submit" name="post" class="btn btn-primary">Poster la question</button>
  </form>
<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>

