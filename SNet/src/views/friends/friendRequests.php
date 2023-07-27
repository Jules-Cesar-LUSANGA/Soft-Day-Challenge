<?php
$title = "Confirmation des demandes d'amis";

ob_start();

require "src/views/includes/header.php";
?>

<main>
    <?php require "src/views/friends/sub_header.php"; ?>
    
    <div class="requests">
        <?php
        if (!empty($requests)) {
            foreach ($requests as $request) {?>
                        
                <div class="text-center border" style="display:inline-block;">
                    <img src="profile/profile.png" alt=""><br>
                    <a href="index.php?profile-for=<?php echo $request['username']; ?>" ><?php echo $request['username']; ?></a><br>
                    <a href="index.php?confirmRequest=<?php echo $request['username']; ?>" class="btn btn-success">Confirmer</a>
                    <a href="index.php?refuseRequest=<?php echo $request['username']; ?>" class="btn btn-danger">Refuser</a>
                </div> 

            <?php
                
            }
        }else {
            echo "Vous n'avez pas de demandes d'amis !";
        }
        ?>
    </div>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>