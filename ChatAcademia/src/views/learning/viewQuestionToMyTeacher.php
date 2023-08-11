<?php
$title = "Apprentissage - Question";

?>
<div class="container ">
    <div class="mt-4 pt-4">
        <div class="">
            Question de
            <a href="index.php?profile-for=<?=$question['by']?>">
                <?= $question['by'] ?>  
            </a>
            adressée à
            <?= $question['to'] ?> (<?= $question['date'] ?>)
        </div>
        <div class="mt-3">
            <?= $question['content'] ?>
        </div>

        <br>
        <!-- Vérifier si la question est déjà close -->
        <?php if(isClosedChat($question_id)==false): ?>
            
            <form action="" method="post">
                
                <!-- Vérifier si l'utilisateur est l'auteur de la question -->
                <?php if(($question['by']==$_SESSION['username']) OR $_SESSION['username']=="admin"): ?>
                    <button type="submit" name="close" class="btn btn-primary">Fermer la discussion</button>
                <?php endif ?>

                <div class="form-group mt-2">
                    <label for="answer">Réaction</label>
                    <br>
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" name="post_comment" class="btn btn-primary mt-2">Réagir</button>
            </form>

        <?php endif; ?>
        
        <hr>
        <!-- Réactions -->
        <div>
            <h3>Réactions (<?=$comments_nbr?>)</h3>
            <!-- Affichage des commentaires -->
            <?php
            if(isset($comments)){
                foreach($comments as $comment): ?>
                <div class="comment">           
                    <div>
                        <h5>
                            <a href="index.php?profile-for=<?= $comment['author'] ?>"><?= $comment['author'] ?></a>
                            <a href="index.php?viewAnswerToComment=<?=$comment['id']?>&question_id=<?=$question_id?>">
                                <i class="bi bi-reply-fill"></i>
                                <?php
                                if (isClosedChat($question_id)==true) {
                                    echo "Réponses";
                                }else{ echo "Répondre"; }
                                ?>
                            </a>
                        </h5>
                    <time>
                        <?= $comment['date'] ?>
                    </time>
                    <p class="mt-2">
                      <?= $comment['content'] ?>
                    </p>

                  </div>                
                </div>
                <hr>
                
            <?php
                endforeach;
            }else {
            ?>
                <p class="alert alert-danger">Aucune réaction pour l'instant</p>
            
            <?php } ?>
        </div>
    </div>
</div>

<?php 

$content=ob_get_clean();
require "src/views/layout.php";
?>