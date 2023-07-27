<?php
$title = "Tous les articles";

ob_start();

require "src/views/includes/header.php";
?>

<main class="container">
    <p>
        <a href="index.php?blog=index">Articles</a>
        <a href="index.php?publishArticle">Publier un article</a>
        <a href="index.php?myArticles">Mes articles</a>
    </p>
    <form action="" method="post">
        <div class="article">
            <label for="category">Catégorie</label>
            <select name="category" id="category">
                <option>Tous</option>
                <option>Technologie</option>
                <option>Sciences</option>
                <option>Développement personnel</option>
                <option>Conseils</option>
                <option>Récommandations</option>
                <option>Autres</option>
            </select>
            <button type="submit" class="btn btn-primary">Afficher</button>
        </div>
    </form>
    <h3>Articles du blog</h3>
    <br>

    <?php

    if(!empty($articles)){
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
                        Publié par <?= $article['author'] . " --- " . $article['date']  ?>
                    </p>
                    <p  class="card-text">
                        <a href="index.php?viewArticle=<?= $article['id'] ?>" class="btn btn-primary">Voir la suite</a>
                    </p>
                </div>
            </article>
            <br>
        <?php
        }
    }else {
        $_SESSION['msg'] = "Aucun article trouvé !";
    }
    ?>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>