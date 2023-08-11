<?php
$title = "Voir l'article";

?>
<div class="container">
    <article class="mt-4 pt-4">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="d-inline-block mb-2 text-primary-emphasis"><?=$article['title'] ?></h3>
          <div class="row mb-2">
            <div class="d-flex align-items-center col-3">
                <i class="bi bi-person"></i>
                 <?=$article['author'] ?>
            </div>
            <div class="d-flex align-items-center col-3">
                <i class="bi bi-clock"></i>
                <?=substr($article['date'],0,10)?>
            </div>
            <div class="d-flex align-items-center col-3">
                <i class="bi bi-chat-dots"></i>
                <?= getArticleCommentsNbr($article_id) . " commentaire(s)"?>           
            </div>
            <div class="d-flex align-items-center col-3">
                <?= $article['likes'] . " like(s)" ?>
            </div>
          </div>

          <p class="card-text mb-2">
              <?=$article['content']?>
          </p>
        </div>
      </div>
    </article>
    <form action="" method="post">

        <?php  
            echo $like_btn;
            if (isset($modify_btn)) {
                echo $modify_btn;
                echo $delete_btn;
            }

        ?>

        <div class="form-group mt-2 mb-2">
            <label for="article">Commentaires</label>
            <textarea class="form-control" name="comment" id="article" rows="3"></textarea>
        </div>
        <button type="submit" name="post_comment" class="btn btn-primary">Poster</button>
    </form>
    <br>
    <div class="comments">
    <?php
        foreach ($comments as $comment) {
        ?>
            <article class="alert alert-success">
                <p>
                    Par 
                    <a href="index.php?profile-for=<?=$comment['author']?>">
                        <?=$comment['author']?>
                    </a>
                    (<?=$comment['date']?>)
                </p>
                <p>
                    <?= $comment['content'] ?>
                </p>
            </article>
        <?php
        }
    ?>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>