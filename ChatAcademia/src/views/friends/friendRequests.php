<?php
$title = "Demandes d'amis";

?>

<div class="container">
    <h3 class="mt-4 pt-4"><?=$title?></h3>
    <hr>
    <div class="requests">
        <?php
        if (!empty($requests)) {
            foreach ($requests as $request) {?>
                        
                <div class="text-center border" style="display:inline-block;">
                    <img src="src/assets/uploads/img/<?php echo $request['img'];?>" class="rounded-circle" width="150" height="150"><br>
                    <a href="index.php?profile-for=<?php echo $request['username']; ?>" ><?php echo $request['username']; ?></a><br>
                </div> 

            <?php
                
            }
        }else {
            echo "Vous n'avez pas de demandes d'amis !";
        }
        ?>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>