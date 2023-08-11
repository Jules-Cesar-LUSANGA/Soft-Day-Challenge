<?php
$title = "Mes amis";

?>
<div class="container ">

    <div class="friends mt-4 pt-4">
        <h3>Mes amis</h3>
        <hr>
        <?php
        if (!empty($friends)) {
            foreach ($friends as $friend) {?>
                        
            <div class="text-center border my-1" style="display:inline-block;">
                <a href="index.php?profile-for=<?php echo $friend['username']; ?>">
                    <img src="src/assets/uploads/img/<?php echo $friend['img'];?>" class="rounded-circle" width="150" height="150"><br>
                    <?php echo $friend['username']; ?>
                </a>
            </div> 

        <?php
            } 

        }else {
            echo "Vous n'avez aucun ami !";
        }
        ?>
    </div>
</div>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>