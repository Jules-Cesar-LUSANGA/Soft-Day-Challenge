<?php
$title = "";

ob_start();

require "src/views/includes/header.php";
?>

<main class="container">
    <div class="">
        Publié par <?php echo $comment['username'];?> -- <?php echo $comment['date'];?>
    </div>
    <div>
        <?php echo $comment['comment']; ?>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="answer">Réponses</label>
            <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
        </div>
        <button type="submit" name="post_answer" class="btn btn-primary">Poster</button>
    </form>
    <div class="answers">
    <?php
        foreach ($answers as $answer) {
        ?>
            <article class="alert alert-success">
                <p>
                    Par <?= $answer['author'] . " --- " . $answer['date']  ?>
                </p>
                <p>
                    <?= $answer['answer'] ?>
                </p>
            </article>
        <?php
        }
    ?>
    </div>
</main>
<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>