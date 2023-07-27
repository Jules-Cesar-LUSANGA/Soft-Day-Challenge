<?php
$title = "Discussions";

ob_start();

require "src/views/includes/header.php";
?>

<main>
    <h3>Messages récents</h3>
    <?php

        foreach ($messages as $message) {
        ?>
            <div>
                <p>
                    <?php
                    if ($message['sender']==$_SESSION['username']) {
                    ?>
                        <a href="index.php?chat-to=<?= $message['receiver'] ?>">
                            <?= $message['sender'] ?> à 
                            <?= $message['receiver'] ?> :
                        </a>
                    <?php
                    }else {
                    ?>
                        <a href="index.php?chat-to=<?= $message['sender'] ?>">
                            <?= $message['sender'] ?>  à
                            <?= $message['receiver'] ?>:
                        </a>
                    <?php
                    }
                    ?> 
                    <?= $message['message'] ?>
                </p>
            </div>
            
        <?php
        }
    ?>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>