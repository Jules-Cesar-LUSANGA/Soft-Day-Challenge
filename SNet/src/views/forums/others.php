<?php
$title = "Forums - Divers";

ob_start();

require "src/views/includes/header.php";
?>
<main>
    <h2>Forum pour les sujets divers</h2>
    <section>
        <a href="index.php?postQuestion=design">Poster une question</a>
        <a href="index.php?myQuestions=design">Mes questions</a>
    </section>
    <br>
    <?php
        foreach ($questions as $question) {
        ?>
            <article class="card">
                <p class="card-header">
                    <?= $question['title'] ?>
                </p>
                <div class="card-body">
                    <p class="card-text">
                        <?= $question['content'] ?>
                    </p>
                    <p  class="card-text">
                        Publié par <?= $question['author'] . " --- " . $question['date']  ?>
                    </p>
                    <p  class="card-text">
                        <a href="index.php?viewQuestion=<?= $question['id'] ?>" class="btn btn-primary">Voir la suite</a>
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