<?php
$title = "Apprentissage - Discussions en cours";
ob_start();
?>
<div class="container mt-4">
    <div class="mt-4 pt-4">

    <h3>Discussions en cours</h3>
    <hr>
        <div class="bd-example m-0 border-0">
        
    <?php
        if (!empty($questions)) {
            foreach($questions as $question):
    ?>
                <div class="alert alert-success">
                    <div class="question_to">
                        Adréssée à <strong><?= $question['to'] ?></strong>
                    </div>
                    <hr>
                    <div class="question-content">
                        
                        <?=(strlen($question['content'])>=50) ? substr($question['content'],0,50) . " [...]" : $question['content']?>
                        
                        <a href="index.php?viewQuestionToMyTeacher=<?= $question['id'] ?>">Voir</a>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            Par <a href="index.php?profile-for=<?=$question['by']?>">
                                <?= $question['by'] ?>
                            </a>
                            
                        </div>

                        <div class="col offset-5">
                            <?= $question['date'] ?>
                        </div>
                    </div>
                </div>

    <?php
            endforeach;
        } else {
    ?>
            <div class="alert alert-danger">
                Aucune discussion en cours
            </div>
    <?php } ?>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>