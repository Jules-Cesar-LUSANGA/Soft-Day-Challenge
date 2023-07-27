<?php
$title = "Forums - Programmation";

ob_start();

require "src/views/includes/header.php";
?>

<main class="container"> 
    <h2>Forum pour les codeurs</h2>
    <section>
        <a href="index.php?postQuestion=code">Poster une question</a>
        <a href="index.php?myQuestions=programmation">Mes questions</a>
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