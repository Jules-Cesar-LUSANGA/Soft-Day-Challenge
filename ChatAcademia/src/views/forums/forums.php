<?php
$title = "Forums";

ob_start();

?> 

<div class="container">
    <h3 class="mt-4 pt-4"><?=$title?></h3>
    <hr>

    <?php foreach ($questions[0] as $question): ?>

        <article>
            <div class="row g-0 border rounded overflow-hidden  flex-md-row mb-2 shadow-sm h-md-250 position-relative">
                <div class="p-4 d-flex flex-column position-static">
                    <h3 class="d-inline-block mb-2 text-primary-emphasis"><?=$question['title'] ?></h3>
                    <div class="row mb-2">
                        <div class="d-flex align-items-center col-3">
                            <i class="bi bi-person"></i>

                            <a href="index.php?profile-for=<?=$question['author']?>">
                                <?=$question['author'] ?>
                            </a>

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
                    <p class="card-text">
                        
                        <?= (strlen($question['content'])>=150) ? substr($question['content'], 0,150) . ' [...]' : $question['content'] ?>
                        
                        <a href="index.php?forum=index&viewQuestion=<?= $question['id'] ?>&page=<?= (isset($_GET['page']))? $_GET['page'] : 0 ?>">Voir</a>
                    
                    </p>
                </div>
            </div>
        </article>
        
    <?php endforeach;?>

    <div class="btn-group me-2 text-center" role="group" aria-label="First group">
        
        <?php for ($i=0; $i < $questions[1]; $i++):  ?>
            
            <a href='index.php?forums=index&page=<?=$i?>' class="btn btn-outline-success <?= ($_GET['page']==$i) ? 'disabled' : '' ?>">
                <?= $i + 1 ?>
            </a>

        <?php endfor;?>

    </div>        
          
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>