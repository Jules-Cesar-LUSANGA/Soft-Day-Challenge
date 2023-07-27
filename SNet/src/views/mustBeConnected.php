<?php
$title = "Utilisateur non connecté";

ob_start();

?>
<div class="container">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Pour accéder à cette page, il faut <a href="../../index.php?login">se connecter</a>.
    </div>
</div>
<?php 

$content=ob_get_clean();
require "layout.php";
?>