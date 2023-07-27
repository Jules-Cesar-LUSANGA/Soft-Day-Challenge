<?php
$title = "Correspondants";

ob_start();

require "src/views/includes/header.php";
?>
<main>
<?php require "src/views/friends/sub_header.php"; ?>
</main>

<?php 
$content=ob_get_clean();
require "src/views/layout.php";
?>