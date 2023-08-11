<?php
$title = "Voir la question";

ob_start();

?>

<div class="container">
    <article class="mt-4 pt-4">
        <div class="row g-0 border rounded overflow-hidden  flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="p-4 d-flex flex-column position-static">
                <h3 class="d-inline-block mb-2 text-primary-emphasis"><?=$question['title'] ?></h3>
                <div class="row mb-2">
                <div class="d-flex align-items-center col-3">
                    <i class="bi bi-person"></i>
                        <?=$question['author'] ?>
                </div>
                <div class="d-flex align-items-center col-3">
                    <i class="bi bi-clock"></i>
                    <?=substr($question['date'],0,10)?>
                </div>
                <div class="d-flex align-items-center col-3">
                    <i class="bi bi-chat-dots"></i>
                    <?=$question['comments_nb'] . " commentaire(s)"?>           
                </div>
                <div class="d-flex align-items-center col-3">
                    <?= $question['likes'] . " like(s)" ?>
                </div>
                </div>

                <p class="card-text mb-2">
                    <?=$question['content']?>
                </p>
            </div>
        </div>
    </article>

    <form action="" method="post">
        <hr>
        <div class="buttons text-center">
            <?php
                // Affichade du bouton de LIKE  
                echo $like_btn;
                
                if (isset($modify_btn)) {
                    echo $modify_btn;
                    echo $delete_btn;
                }

            ?>
            <a href="index.php?<?= ($_GET['forum']=="myQuestions") ? 'myQuestions=index' : "forums=" . $_GET['forum'] . "&page=". $_GET['page'] ?>" class="btn btn-outline-info">Retour au forum</a>
        </div>
        <hr>
        <div class="form-group mt-4">
            <label for="comment">Commentaire</label>
            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
        </div>
        <button type="submit" name="post_comment" class="btn btn-success mt-2">Commenter</button>
    </form>
    <div class="comments mt-4">
    <?php
        foreach ($comments as $comment) {
        ?>
            <!-- <article class="alert alert-success">
                <p>
                    Par <?= $comment['author'] . " --- " . $comment['date']  ?>
                </p>
                <p>
                    <?= $comment['comment'] ?>
                </p>
                <p>
                    <a href="index.php?answer=<?= $comment['id'] ?>&question_id=<?= $question_id ?>&forum=<?=$forum?>&page=<?=$page?>">Réponde</a>
                </p>
            </article> -->

            <div class="comment">           
                <div>
                    <h5>
                        <a href="index.php?profile-for=<?= $comment['author'] ?>"><?= $comment['author'] ?></a>
                        <a href="index.php?answer=<?= $comment['id'] ?>&question_id=<?= $question_id ?>&forum=<?=$forum?>&page=<?=$page?>">
                            <i class="bi bi-reply-fill"></i>
                            Répondre
                        </a>
                    </h5>
                <time>
                    <?= $comment['date'] ?>
                </time>
                <p class="mt-2">
                  <?= $comment['comment'] ?>
                </p>

              </div>                
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