<?php
$title = "Mes amis";

ob_start();

require "src/views/includes/header.php";
?>
<main>
    <?php require "src/views/friends/sub_header.php"; ?>

    <div class="friends">
        <?php
        if (!empty($friends)) {
            foreach ($friends as $friend) {?>
                        
                <div class="text-center border" style="display:inline-block;">
                    <img src="profile/profile.png" alt=""><br>
                    <a href="index.php?profile-for=<?php echo $friend['username']; ?>" ><?php echo $friend['username']; ?></a><br>
                </div> 

        <?php
            } 

        }else {
            echo "Vous n'avez aucun ami !";
        }
        ?>
    </div>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>