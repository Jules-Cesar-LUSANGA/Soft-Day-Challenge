<?php
$title = "Discussions privées";

?>

<div class="container-fluid">
    <h3>Messages récents</h3>

    <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-4">
            <div class="recentMessages">
                <?php

                if(!empty($recentMessages)){
                    foreach ($recentMessages as $message) {
                ?>
                        <div class="comment d-flex">
                            <div class="flex-shrink-0">
                              <div class="avatar avatar-sm ">
                                <img class="avatar-img rounded-circle" src="src/assets/uploads/img/<?=$message['img']?>" width="30">
                              </div>
                            </div>
                            <div class="flex-shrink-1 ms-2 ms-sm-3">
                              <div class="comment-meta d-flex">
                                <h6 class="me-2">
                                    <?php
                                        if ($message['sender']==$_SESSION['username']) {
                                        ?>
                                            <a href="index.php?chat-to=<?=$message['receiver']?>">
                                                <?=$message['receiver']?>    
                                            </a>
                                            
                                        <?php
                                        }else {
                                        ?>
                                            <a href="index.php?chat-to=<?= $message['sender'] ?>">
                                                <?= $message['sender'] ?>
                                            </a>
                                        <?php
                                        }
                                        ?>

                                </h6>
                                <span class="text-muted"><?= $message['date'] ?></span>
                              </div>
                              <div class="comment-body">
                                <?= (strlen($message['message'])>=15) ? substr($message['message'],0,15) . "..." : $message['message']; ?>
                              </div>
                            </div>
                        </div>
                        <hr>
                        
                <?php
                    }
                }else {
                    echo "Aucun message !";
                }
                ?>
            </div>
    
        </div>
        <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="mx-auto justify-content-center">
                <h3>Les messages s'affichent ici</h3>
            </div>
        </div>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>