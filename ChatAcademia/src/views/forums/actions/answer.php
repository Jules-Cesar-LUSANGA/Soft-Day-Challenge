<?php
$title = "Réponses au commentaire";

?>

<div class="container">
    <br>
    <article class="alert alert-secondary mt-4">
        <p>
            <a href="index.php?profile-for=<?= $comment['username'] ?>"><?= $comment['username'] ?></a> 
        </p>
        <p>
            <?= $comment['comment'] ?>
        </p>

        <!-- Rédirections -->
        <a href="index.php?forum=<?=$forum?>&page=<?=$page?>&viewQuestion=<?=$question_id?>">Retourner à la question</a>
    
    </article>
    <hr>
    <form action="" method="post">
        <div class="form-group">
            <label for="answer">Réponses</label>
            <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
        </div>
        <button type="submit" name="post_answer" class="btn btn-primary mt-2">Poster</button>
    </form>
    <div class="answers mt-4 mb-4">
    <?php
        foreach ($answers as $answer) {
        ?>
            <article>
                <p>
                    <a href="index.php?profile-for=<?= $answer['author'] ?>"><?= $answer['author'] ?></a> 

                    (<?=$answer['date']?>)
                </p>
                <p>
                    <?= $answer['answer'] ?>
                </p>
                <hr>
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