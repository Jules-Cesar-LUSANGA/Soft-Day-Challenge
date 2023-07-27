<?php
$title = "";

ob_start();
require "src/views/includes/header.php";

?>

<main>
    <form action="" method="post">
        <label>Nos messages</label><br>
        
        <?php
        if(!empty($messages)) {
            foreach ($messages as $message) {   
                
                echo "<p>" .$message['sender'] . " : " . $message['message']."</p>";

                if(isset($btn) AND isset($msg_id) AND $msg_id==$message['id']){
                    echo "<a href=index.php?deleteMsg=" . $message['id'] . ">Supprimer</a>";
                }
            }
        }
        ?> 

        <textarea name="message" class="form-control" cols="30" rows="10"></textarea><br>
        <input type="submit" class="btn btn-info" value="Envoyer" name="send">
    </form>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>