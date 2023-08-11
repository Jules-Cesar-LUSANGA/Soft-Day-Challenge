<?php
$title = "Mes articles";

ob_start();
?>

<div class="container ">
    <div class="album bg-body-tertiary">
        <div class="container">
            <h3>Mes articles</h3><hr>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
                foreach ($articles as $article) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="article_img" src="src/assets/uploads/blog_img/<?= $article['img'] ?>" alt="Photo de l'article">
                            <div class="card-body">
                            <p class="card-text"><?= (strlen($article['title'])<=30) ? $article['title'] : substr($article['title'],0,30) . "..." ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="index.php?viewArticle=<?= $article['id'] ?>" class="btn btn-sm btn-outline-secondary">Voir</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            ?>
            </div>
        </div>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>