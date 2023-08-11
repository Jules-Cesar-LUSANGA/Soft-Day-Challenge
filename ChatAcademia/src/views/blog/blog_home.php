<?php
$title = "Tous les articles";

ob_start();
?>
<div class="container">
    <h3 class="mt-4 pt-4">Articles du blog</h3>
    <form action="" method="post"><label for="category">Catégorie</label>
      <div class="row">
        <div class="col-9">
            
            <select name="category" id="category" class="form-control">
                <option>Tous</option>
                <option>Technologie</option>
                <option>Sciences</option>
                <option>Développement personnel</option>
                <option>Conseils</option>
                <option>Récommandations</option>
                <option>Autres</option>
            </select>
            
        </div>

        <div class="col-3 mb-4">
          <button type="submit" class="btn btn-primary">Afficher</button>
        </div>
      </div>
        
    </form>
    <div>
        <?php if(!empty($articles)){?>
            <?php foreach ($articles as $article):?>
        
            <article>
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                
                <div class="col p-4 d-flex flex-column position-static">
                  <h3 class="d-inline-block mb-2 text-primary-emphasis"><?=$article['title'] ?></h3>
                  <div class="row mb-2">
                      <div class="d-flex align-items-center col-4">
                        <i class="bi bi-person"></i>
                         <?=$article['author'] ?>
                    </div>
                      <div class="d-flex align-items-center col-4">
                        <i class="bi bi-clock"></i>
                        <?=$article['date']?>
                    </div>
                    <div class="d-flex align-items-center col-4">
                        <i class="bi bi-chat-dots"></i>
                        <?= getArticleCommentsNbr($article['id']) . " commentaire(s)"?>           
                    </div>
                  </div>

                  <p class="card-text mb-2">
                      <?=(strlen($article['content'])>=150) ? substr($article['content'],0,150) . " [...]" : $article['content']?>
                  </p>
                  <a href="index.php?viewArticle=<?=$article['id'] ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                    Continuer la lecture
                  </a>
                </div>
              </div>
            </article>

        <?php
            endforeach;
        }else {
            $_SESSION['msg'] = "Aucun article trouvé !";
        }
        ?>

    </div>

    <?php if(isset($_SESSION['msg'])): ?>
      <div class="alert alert-danger">
        <?=$_SESSION['msg']?>
      </div>
    <?php unset($_SESSION['msg']) ?>
    <?php endif; ?>

</div>

<?php 

$content=ob_get_clean();
require "src/views/layout.php";

?>