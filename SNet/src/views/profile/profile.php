<?php
$title = "Profil";

ob_start();

require "src/views/includes/header.php";
?>
<main>
    <p class="username">
        <?php 
        
        echo $userInfos['username']; 
  
        ?>
    </p>
    <p class="actions">
        <?php
            if ($userInfos['username']==$_SESSION['username']) {
                echo "<a href='index.php?modifyProfile'>Modifier mon profil</a>";
            }else{
                if (isMyFriend($_GET['profile-for'])==true) {
                    echo "<a href='index.php?chat-to=" . $userInfos['username'] . "'>Envoyer un message</a>";
                }else {
                    echo "<a href='index.php?add_friend=" . $userInfos['username'] . "'>Demande d'ami</a>";
                }
            }
        ?>
    </p>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>