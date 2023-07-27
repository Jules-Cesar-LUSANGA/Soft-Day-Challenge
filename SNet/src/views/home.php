<?php
$title = "Acceuil";
$current_page="app";
ob_start();
require "src/views/includes/header.php";

?>
<div>
    <h1>Accueil</h1>
</div>
<?php 

$content=ob_get_clean();
require "src/views/layout.php";
?>