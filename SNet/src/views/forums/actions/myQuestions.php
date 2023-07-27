<?php
$title = "Forums - Mes questions";
require "src/views/includes/header.php";
ob_start();
?>

<main class="container">
    <h2>Mes questions</h2>
    <br>
    <?php
        foreach ($myQuestions as $question) {
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