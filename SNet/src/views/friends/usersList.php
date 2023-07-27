<?php
$title = "Liste des utilisateurs";

ob_start();

require "src/views/includes/header.php";
?>
<main>
    <?php require "src/views/friends/sub_header.php"; ?>

    <div class="users">
        <?php
        foreach ($users as $user) {?>
                    
            <div class="text-center border" style="display:inline-block;">
                <img src="profile/profile.png" alt=""><br>
                <a href="index.php?profile-for=<?php echo $user['username']; ?>" ><?php echo $user['username']; ?></a><br>
                <!-- <a href="index.php?add_friend=<?php echo $user['username']; ?>" class="btn btn-success">Ajouter</a> -->
            </div> 

        <?php
            
        }
        ?>
    </div>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>