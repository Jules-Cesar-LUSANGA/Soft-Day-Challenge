<?php
$title = "Discussions";

ob_start();

require "src/views/includes/header.php";
?>
<main>
    <h3>Utilisateurs de SNet</h3>
    <ol>
    <?php
        foreach ($users as $user) {
            echo "<li><a href='index.php?chat-to=". $user."'>" . $user . "</a></li>";
        }
    ?>
    </ol>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>