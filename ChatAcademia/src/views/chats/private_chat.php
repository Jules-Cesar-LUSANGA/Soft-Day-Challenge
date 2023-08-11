<?php
$title = "Discussion privée avec " . $_GET['chat-to'];

ob_start();

?>
<div class="container-fluid">
    <div class="row mt-4 pt-4">
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

        <div class="col-md-8 col-lg-8 col-sm-8" style="border-left: red 2px solid;">
            <h3>Discuter en privée avec 
                <a href="index.php?profile-for=<?=$_GET['chat-to']?>">
                    <?=$_GET['chat-to']?>
                </a>
            </h3>
            <form action="" method="post">
                    <div class="row d-flex justify-content-center container">
                        <div class="card" id="chat1" style="border-radius: 15px;">
                            <div class="card-body">

                                <?php

                                if(!empty($messages)) {

                                    foreach ($messages as $message): 

                                        if ($message['sender']==$_SESSION['username']) {
                                    ?>
                                            <div class="d-flex flex-row justify-content-end mb-4">
                                                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: rgba(164,100,134, 0.5);">
                                                    <p class="small mb-0">
                                                    <?=$message['message']?>
                                                    </p>
                                                </div>
                                                <img src="src/assets/uploads/img/<?=$message['img']?>" alt="avatar 1" style="width: 45px; height: 100%;" class="rounded-circle">
                                            </div>

                                    <?php
                                    }else{
                                    ?>
                                            <div class="d-flex flex-row justify-content-start mb-4">
                                                
                                                <img src="src/assets/uploads/img/<?=$message['img']?>" alt="avatar 1" style="width: 45px; height: 100%;" class="rounded-circle">
                                                <div class="p-3 ms-3 bg-secondary" style="border-radius: 15px;">
                                                    <p class="small mb-0">
                                                        <?=$message['message']?>
                                                    </p>
                                                </div>

                                            </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                    endforeach;
                                }
                                ?> 
                                <hr>
                                <div class="fixed-left justify-content-end">
                                    <div class="message">
                                        <input type="text" name="message" placeholder="Taper le message" class="form-control">
                                        <input type="submit" class="btn btn-info mt-2 " value="Envoyer" name="send">
                                    </div>
                                </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php 



$content=ob_get_clean();
require "src/views/layout.php";
?>