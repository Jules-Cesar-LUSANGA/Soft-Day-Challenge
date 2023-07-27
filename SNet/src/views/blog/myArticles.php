<?php
$title = "Mes articles";

ob_start();

require "src/views/includes/header.php";
?>

<main class="container">
    <p>
        <a href="index.php?blog=index">Articles</a>
        <a href="index.php?publishArticle">Publier un article</a>
        <a href="index.php?myArticles">Mes articles</a>
    </p>
    <h3>Mes articles</h3>
    <br>
    <?php
        foreach ($articles as $article) {
        ?>
            <article class="card">
                <p class="card-header">
                    <?= $article['title'] ?>
                </p>
                <div class="card-body">
                    <p class="card-text">
                        <?= $article['content'] ?>
                    </p>
                    <p  class="card-text">
                        <a href="index.php?viewArticle=<?= $article['id'] ?>" class="btn btn-primary">Voir la suite</a>
                    </p>
                </div>
            </article>
            <br>
        <?php
        }
    ?>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>