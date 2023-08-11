<?php
$title = "Réponses à la réaction";

?>

<div class="container">
    <div class="mt-4 pt-4">
        <article class="alert alert-info">
            <p>
                Commentaire de <a href="index.php?profile-for=<?=$comment['author']?>"><?=$comment['author']?></a>
            </p>
            <p>
                <?= $comment['content'] ?>
            </p>
            <a href="index.php?viewQuestionToMyTeacher=<?= $question_id ?>">Retourner à la question</a>
        </article>
    </div>
    <?php if(isClosedChat($question_id)==false): ?>

    <form action="" method="post">
        <div class="form-group">
            <label for="answer">Réponses</label>
            <textarea class="form-control" name="answer" id="answer" rows="3"></textarea>
        </div>
        <div class="form-group mt-3 mb-3">
            <button type="submit" name="post_answer" class="btn btn-primary">Répondre</button>          
        </div>
    </form>

    <?php endif; ?>

    <div class="answers">
        <h3>Réponses</h3>
        <?php
        if(!empty($answers)){
            foreach ($answers as $answer) {
            ?>
                <article class="alert alert-success">
                    <p>
                        Par <?= $answer['author'] . " --- " . $answer['date']  ?>
                    </p>
                    <p>
                        <?= $answer['content'] ?>
                    </p>
                </article>
            <?php
            }
        }
        else {
        ?>
            <div class="alert alert-danger">
                Aucune réponse pour l'instant
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>