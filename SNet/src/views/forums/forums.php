<?php
$title = "Forums";

ob_start();

require "src/views/includes/header.php";
?>

<main>
    <div class="container">
        <a name="design" class="btn btn-primary" href="index.php?forums&design" role="button">Design</a><br>
        <a name="code" class="btn btn-success" href="index.php?forums&code" role="button">Programmation</a><br>
        <a name="network" class="btn btn-info" href="index.php?forums&network" role="button">Réseaux</a><br>
        <a name="others" class="btn btn-warning" href="index.php?forums&others" role="button">Autres</a><br>
    </div>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>