<?php

unset($_SESSION['username']);
unset($_SESSION['user_category']);

header("Location:index.php");

// Fermeture de la page
exit();